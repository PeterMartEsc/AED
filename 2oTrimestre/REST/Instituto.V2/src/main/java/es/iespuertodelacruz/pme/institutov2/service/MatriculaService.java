package es.iespuertodelacruz.pme.institutov2.service;

import java.util.ArrayList;
import java.util.List;

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
public class MatriculaService implements IServiceGeneric<Matricula, Integer>  {

	@Autowired MatriculaRepository matriculaRepository;
	@Autowired AsignaturaRepository asignaturaRepository;
	@Autowired AlumnoRepository alumnoRepository;


	
	@Override
	public List<Matricula> findAll() {
		return null;
	}

	@Override
	public Matricula findById(Integer id) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	@Transactional
	public Matricula save(Matricula matricula) {

		if(matricula.getAlumno() == null) {
			return null;
		}
		
		Alumno alumno = alumnoRepository.findById(matricula.getAlumno().getDni()).orElse(null);
		if(alumno == null) {
			return null;
		}
		
		List<Asignatura> asignaturas = new ArrayList<Asignatura>();
		
		if(matricula.getAsignaturas() != null && matricula.getAsignaturas().size() > 0){
			
			matricula.getAsignaturas().forEach(
					a -> {
							Asignatura asignatura = asignaturaRepository.findById(a.getId()).orElse(null);
							if(asignatura == null) {
								throw new RuntimeException("No existe la asignatura");
							}
							asignaturas.add(a);
							a.getMatriculas().add(matricula);
						}
			);
			
			//matricula.getAsignaturas().clear;
			matricula.setAsignaturas(asignaturas);
		}
		
		return matriculaRepository.save(matricula);
	}

	@Override
	public boolean update(Matricula matricula) {
		// TODO Auto-generated method stub
		return false;
	}

	@Override
	@Transactional
	public boolean deleteById(Integer id) {
		matriculaRepository.deleteRelatedAsignaturasById(id);
		
		Matricula matricula = matriculaRepository.findById(id).orElse(null);
		matriculaRepository.delete(matricula);

		return true;
	}

}
