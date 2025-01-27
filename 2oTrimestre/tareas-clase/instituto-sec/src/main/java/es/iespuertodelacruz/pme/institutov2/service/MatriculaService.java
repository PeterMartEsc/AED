package es.iespuertodelacruz.pme.institutov2.service;

import java.util.ArrayList;
import java.util.List;

import es.iespuertodelacruz.pme.institutov2.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
import es.iespuertodelacruz.pme.institutov2.entity.Asignatura;
import es.iespuertodelacruz.pme.institutov2.entity.Matricula;
import es.iespuertodelacruz.pme.institutov2.repository.AlumnoRepository;
import es.iespuertodelacruz.pme.institutov2.repository.AsignaturaRepository;
import es.iespuertodelacruz.pme.institutov2.repository.MatriculaRepository;

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
			return null;
		}

		//Busca el alumno, si es null devuelve null
		Alumno alumno = alumnoRepository.findById(matricula.getAlumno().getDni()).orElse(null);
		if(alumno == null) {
			return null;
		}

		List<Asignatura> asignaturas = new ArrayList<Asignatura>();

		//Si la matrícula tiene una lista de asignaturas no nula y mayor que 0
		if(matricula.getAsignaturas() != null && !matricula.getAsignaturas().isEmpty()){
			
			matricula.getAsignaturas().forEach(
					asignatura -> {
							//Obtiene cada asignatura por id
							Asignatura asignaturaNotNull = asignaturaRepository.findById(asignatura.getId()).orElse(null);
							if(asignaturaNotNull == null) {
								//Si la asignatura es nula, devuelve que no existe
								throw new RuntimeException("No existe la asignatura");
							}
							//Si no es null, la añade a la lista de asignaturas
							asignaturas.add(asignatura);
							// Accede a la lista de asignaturas de la asignatura actual
							// y le añade la matricula, ya que se ha creado una relación
							asignatura.getMatriculas().add(matricula);
							}
			);
			
			//matricula.getAsignaturas().clear;
			matricula.setAsignaturas(asignaturas);
		}
		//alumno.getMatriculas().add(matricula); //????

		//Se guarda la matrícula
		return matriculaRepository.save(matricula);
	}

	@Override
	public boolean update(Matricula object) {

		if(object != null && object.getId() != 0) {

			Matricula matricula = matriculaRepository.findById(object.getId()).orElse(null);

			if (matricula == null){
				throw new RuntimeException("No existe la matricula " +object);
			}

			if(matricula.getAlumno() != null){
				Alumno alumno = alumnoRepository.findAlumnoByDni(matricula.getAlumno().getDni());
				if(alumno == null){
					throw new RuntimeException("No existe el alumno " +matricula.getAlumno());
				}
				matricula.setAlumno(object.getAlumno());
			}

			List<Asignatura> asignaturas = new ArrayList<Asignatura>();
			//Si la matrícula tiene una lista de asignaturas no nula y mayor que 0
			if(matricula.getAsignaturas() != null && !matricula.getAsignaturas().isEmpty()){

				matricula.getAsignaturas().forEach(
						asignatura -> {
							//Obtiene cada asignatura por id
							Asignatura asignaturaNotNull = asignaturaRepository.findById(asignatura.getId()).orElse(null);
							if(asignaturaNotNull == null) {
								//Si la asignatura es nula, devuelve que no existe
								throw new RuntimeException("No existe la asignatura " +asignatura);
							}
							//Si no es null, la añade a la lista de asignaturas
							asignaturas.add(asignatura);
							// Accede a la lista de asignaturas de la asignatura actual
							// y le añade la matricula, ya que se ha creado una relación
							asignatura.getMatriculas().add(matricula);
						}
				);

				//matricula.getAsignaturas().clear;
				matricula.setAsignaturas(asignaturas);
			}

			matriculaRepository.save(matricula); //??

			return true;
		} else{
			return false;
		}
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
