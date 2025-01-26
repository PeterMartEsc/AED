package es.iespuertodelacruz.pme.institutov2.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
import es.iespuertodelacruz.pme.institutov2.repository.AlumnoRepository;

@Service
public class AlumnoService implements IServiceGeneric<Alumno, String>{

	@Autowired AlumnoRepository alumnoRepository;
	
	@Override
	public List<Alumno> findAll() {
		return alumnoRepository.findAll();
	}

	@Override
	public Alumno findById(String id) {
		return alumnoRepository.findById(id).orElse(null);
	}

	@Override
	@Transactional
	public Alumno save(Alumno object) {		
		return alumnoRepository.save(object);
	}

	@Override
	@Transactional
	public boolean update(Alumno object) {
		if(object != null && object.getDni() != null) {
			Alumno alumno = alumnoRepository.findById(object.getDni()).orElse(null);
			alumno.setNombre(object.getNombre());
			alumno.setApellidos(object.getApellidos());
			alumno.setFechanacimiento(object.getFechanacimiento());
		} return 
				false;
		
	}

	@Override
	@Transactional
	public boolean deleteById(String id) {
		
		//	if(alumnoRepository.existsById(id)) {
		//		alumnoRepository.deleteById(id);
		//		return true;
		//	} else {
		//		return false;
		//	}
		
		int cantidad = alumnoRepository.deleteAlumnoBydDni(id);
		return cantidad > 0;
		
	}

}
