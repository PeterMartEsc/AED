package es.iespuertodelacruz.pme.institutov2.service;

import java.util.List;

import es.iespuertodelacruz.pme.institutov2.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
import es.iespuertodelacruz.pme.institutov2.repository.AlumnoRepository;

@Service
public class AlumnoService implements IServiceGeneric<Alumno, String> {

	@Autowired AlumnoRepository alumnoRepository;
	
	@Override
	public List<Alumno> findAll() {
		return alumnoRepository.findAll();
	}

	@Override
	public Alumno findById(String dni) {
		return alumnoRepository.findById(dni).orElse(null);
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
			if(alumno == null){
				throw new RuntimeException("No existe el alumno " +object);
			}

			alumno.setNombre(object.getNombre());
			alumno.setApellidos(object.getApellidos());
			alumno.setFechanacimiento(object.getFechanacimiento());
			//set lista de asignaturas
			alumno.setImagen(object.getImagen());
			//alumnoRepository.save(alumno);
			return true;
		} else{
			return false;
		}
	}

	@Override
	@Transactional
	public boolean deleteById(String id) {

		int cantidad = alumnoRepository.deleteAlumnoBydDni(id);
		return cantidad > 0;	//Si se borra algún registro, devuelve true, si no false
		
	}

}
