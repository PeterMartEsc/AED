package es.iespuertodelacruz.pme.institutosec.service;

import java.util.ArrayList;
import java.util.List;

import es.iespuertodelacruz.pme.institutosec.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.entity.Matricula;
import es.iespuertodelacruz.pme.institutosec.repository.AlumnoRepository;
import es.iespuertodelacruz.pme.institutosec.repository.AsignaturaRepository;
import es.iespuertodelacruz.pme.institutosec.repository.MatriculaRepository;

@Service
public class MatriculaService implements IServiceGeneric<Matricula, Integer> {

	@Autowired MatriculaRepository matriculaRepository;
	@Autowired AsignaturaRepository asignaturaRepository;
	@Autowired AlumnoRepository alumnoRepository;


	
	@Override
	public List<Matricula> findAll() {
		return matriculaRepository.findAll();
	}

	@Override
	public Matricula findById(Integer id) {
		return matriculaRepository.findById(id).orElse(null);
	}

	@Override
	@Transactional
	public Matricula save(Matricula matricula) {

		//Si el alumno de la matrícula es null, devolver null
		if(matricula.getAlumno() == null) {
			throw new RuntimeException("La matricula tiene que tener un alumno");
		}

		//Busca el alumno, si es null devuelve null
		Alumno alumno = alumnoRepository.findById(matricula.getAlumno().getDni()).orElse(null);
		if(alumno == null) {
			throw new RuntimeException("No existe el alumno");
		}
		matricula.setAlumno(alumno);

		//Se guarda la matrícula
		Matricula matriculaSaved = matriculaRepository.save(matricula);

		List<Asignatura> asignaturas = new ArrayList<>();
		//Si la matrícula tiene una lista de asignaturas no nula y mayor que 0 (no está vacia)
		if(matricula.getAsignaturas() != null && !matricula.getAsignaturas().isEmpty()){
			
			matricula.getAsignaturas().forEach(
					asignatura -> {
							//Obtiene cada asignatura por id
							Asignatura asignaturaNotNull = asignaturaRepository.findById(asignatura.getId()).orElse(null);
							System.out.println(asignaturaNotNull);
							if(asignaturaNotNull == null) {
								//Si la asignatura es nula, devuelve que no existe
								throw new RuntimeException("No existe la asignatura");
							}
							//Si no es null, la añade a la lista de asignaturas
							asignaturas.add(asignaturaNotNull);
							matriculaRepository.createRelationAsignaturaMatricula(matriculaSaved.getId(), asignaturaNotNull.getId());
					}
			);

		}
		//Set de asignaturas para que no devuelva la que unicamente tiene ids
		matriculaSaved.setAsignaturas(asignaturas);
		return matriculaSaved;
	}

	@Override
	@Transactional
	public boolean update(Matricula object) {

		Matricula matricula = matriculaRepository.findById(object.getId()).orElse(null);

		if (matricula == null){
			throw new RuntimeException("No existe la matricula " +object);
		}

		if(object.getAnio() != 0){
			matricula.setAnio(object.getAnio());
		}

		if(object.getAlumno() != null){
			Alumno alumno = alumnoRepository.findById(matricula.getAlumno().getDni()).orElse(null);
			if(alumno == null){
				throw new RuntimeException("No existe el alumno " +matricula.getAlumno());
			}
			matricula.setAlumno(object.getAlumno());
		}

		Matricula matriculaSaved = matriculaRepository.save(matricula);

		//Si la matrícula tiene una lista de asignaturas no nula y mayor que 0
		if(object.getAsignaturas() != null && !object.getAsignaturas().isEmpty()){
			//Borra la RELACIÓN de esta matrícula con cualquier asignatura
			matriculaRepository.deleteRelatedAsignaturasById(object.getId());

			List<Asignatura> asignaturas = new ArrayList<Asignatura>();

			object.getAsignaturas().forEach(
					asignatura -> {
						//Obtiene cada asignatura por id
						Asignatura asignaturaNotNull = asignaturaRepository.findById(asignatura.getId()).orElse(null);
						if(asignaturaNotNull == null) {
							//Si la asignatura es nula, devuelve que no existe
							throw new RuntimeException("No existe la asignatura " +asignatura);
						}
						//Si no es null, la añade a la lista de asignaturas
						asignaturas.add(asignatura);
						matriculaRepository.createRelationAsignaturaMatricula(matriculaSaved.getId(), asignaturaNotNull.getId());
					}
			);

			//matricula.getAsignaturas().clear;
			matriculaSaved.setAsignaturas(asignaturas);
		}

		//matriculaRepository.save(matricula); //??

		return true;
	}

	@Override
	@Transactional
	public boolean deleteById(Integer id) {
		//Borra la RELACIÓN de esta matrícula con cualquier asignatura
		matriculaRepository.deleteRelatedAsignaturasById(id);
		
		//Matricula matricula = matriculaRepository.findById(id).orElse(null);
		int cantidad = matriculaRepository.deleteByIdNotVoid(id);

		return cantidad > 0;
	}

}
