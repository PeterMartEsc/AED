package es.iespuertodelacruz.pme.institutosec.service;

import java.util.List;

import es.iespuertodelacruz.pme.institutosec.repository.MatriculaRepository;
import es.iespuertodelacruz.pme.institutosec.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.repository.AlumnoRepository;

@Service
public class AlumnoService implements IServiceGeneric<Alumno, String> {

	@Autowired AlumnoRepository alumnoRepository;
	@Autowired
	MatriculaRepository matriculaRepository;
	/*@Autowired
	AsignaturaService asignaturaService;*/


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
		String regex = "^[0-9]{8}[A-Z]{1}$";

		if(object.getDni() == null || !object.getDni().matches(regex)){
			throw new RuntimeException("El DNI del alumno no es válido");
		}

		if(object.getNombre() == null){
			throw new RuntimeException("El alumno ha de tener nombre");
		}

		if(object.getApellidos() == null){
			throw new RuntimeException("El alumno ha de tener apellidos");
		}

		if(object.getFechanacimiento() == null){
			throw new RuntimeException("El alumno ha de tener fecha de nacimiento");
		}

		/*if(object.getImagen() == null){
			throw new RuntimeException("El alumno ha de tener una foto");
		}*/

		return alumnoRepository.save(object);
	}

	@Override
	@Transactional
	public boolean update(Alumno object) {

		if(object != null && object.getDni() != null) {

			Alumno alumno = alumnoRepository.findById(object.getDni()).orElse(null);
			if(alumno == null){
				throw new RuntimeException("No existe el alumno " +object);
				//TODO: cambiarlo por un false ?
			}

			if(object.getNombre() != null){
				alumno.setNombre(object.getNombre());
			}

			if(object.getApellidos() != null){
				alumno.setApellidos(object.getApellidos());
			}

			if(object.getFechanacimiento() != null){
				alumno.setFechanacimiento(object.getFechanacimiento());
			}

			if(object.getImagen() != null){
				alumno.setImagen(object.getImagen());
			}

			alumnoRepository.save(alumno);
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
