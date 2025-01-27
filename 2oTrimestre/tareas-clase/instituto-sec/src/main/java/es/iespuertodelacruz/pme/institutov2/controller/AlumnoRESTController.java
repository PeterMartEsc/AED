package es.iespuertodelacruz.pme.institutov2.controller;

import java.util.logging.Logger;
import java.util.stream.Collectors;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutov2.dto.AlumnoDTO;
import es.iespuertodelacruz.pme.institutov2.service.AlumnoService;

@RestController
@RequestMapping("/api/alumnos")
@CrossOrigin
public class AlumnoRESTController {
	
	@Autowired AlumnoService alumnoService;
	
	@GetMapping("/")
	public ResponseEntity<?> findAllAlumnos(){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");

		return ResponseEntity.ok(alumnoService.findAll()
			.stream()
			.map(alumno -> new AlumnoDTO(
							alumno.getDni(), 
							alumno.getNombre(), 
							alumno.getApellidos(), 
							alumno.getFechanacimiento(), 
							alumno.getMatriculas()
							)
				)
			//.collect(Collectors.toList())
		);
	}

	@GetMapping("/{dni}")
	public ResponseEntity<?> findAlumnoByDni(@PathVariable String dni){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		Alumno alumno = alumnoService.findById(dni);
		AlumnoDTO dto = new AlumnoDTO(
				alumno.getDni(),
				alumno.getNombre(),
				alumno.getApellidos(),
				alumno.getFechanacimiento(),
				alumno.getMatriculas()
		);
		return ResponseEntity.ok(dto);
	}
	
}
