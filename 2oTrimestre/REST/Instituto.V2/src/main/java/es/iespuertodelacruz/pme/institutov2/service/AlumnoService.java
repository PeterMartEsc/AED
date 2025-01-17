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
		// TODO Auto-generated method stub
		return alumnoRepository.findAll();
	}

	@Override
	public Alumno findById(String id) {
		// TODO Auto-generated method stub
		return alumnoRepository.findById(id).orElse(null);
	}

	@Override
	@Transactional
	public Alumno save(Alumno object) {
		// TODO Auto-generated method stub
		
		return alumnoRepository.save(object);;
	}

	@Override
	@Transactional
	public boolean update(Alumno object) {
		// TODO Auto-generated method stub
		if(object != null && object.getDni() != null) {
			Alumno alumno = alumnoRepository.findById(object.getDni()).orElse(null);
			alumno.setNombre(object.getNombre());
			alumno.setApellidos(object.getApellidos());
			alumno.setFechanacimiento(object.getFechanacimiento());
		} else {
			return false;
		}
		
	}

	@Override
	@Transactional
	public boolean deleteById(String id) {
		// TODO Auto-generated method stub
		
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
