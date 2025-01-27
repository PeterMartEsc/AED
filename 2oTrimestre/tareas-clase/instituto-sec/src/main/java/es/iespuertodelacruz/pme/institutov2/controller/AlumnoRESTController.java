package es.iespuertodelacruz.pme.institutov2.controller;

import es.iespuertodelacruz.pme.institutov2.dto.AlumnoDTOIn;
import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutov2.dto.AlumnoDTOOut;
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
			.map(alumno -> new AlumnoDTOOut(
							alumno.getDni(), 
							alumno.getNombre(), 
							alumno.getApellidos(), 
							alumno.getFechanacimiento(), 
							alumno.getMatriculas(),
							alumno.getImagen()
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
		AlumnoDTOOut dto = new AlumnoDTOOut(
						alumno.getDni(),
						alumno.getNombre(),
						alumno.getApellidos(),
						alumno.getFechanacimiento(),
						alumno.getMatriculas(),
						alumno.getImagen()
						);
		return ResponseEntity.ok(dto);
	}

	@PostMapping("/create")
	public ResponseEntity<?> create(@RequestBody AlumnoDTOIn dto){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		Alumno alumno = new Alumno();
		alumno.setDni(dto.dni());
		alumno.setNombre(dto.nombre());
		alumno.setApellidos(dto.apellidos());
		alumno.setImagen(dto.imagen());
		return ResponseEntity.ok(alumnoService.save(alumno));
	}
}
