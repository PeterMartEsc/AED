package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOEntradaV3;
import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOSalidaV3;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;

@RestController
@RequestMapping("/api/v3/alumnos")
@CrossOrigin
public class AlumnoRESTControllerV3 {
	
	@Autowired AlumnoService alumnoService;
	
	@GetMapping
	//@PreAuthorize("hasRole('ROLE_ADMIN')")
	public ResponseEntity<?> findAllAlumnos(){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		System.out.println("holaaaaaa estoy aqui");
		return ResponseEntity.ok(alumnoService.findAll()
			.stream()
			.map(alumno -> new AlumnoDTOSalidaV3(
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
		AlumnoDTOSalidaV3 dto = new AlumnoDTOSalidaV3(
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
	public ResponseEntity<?> createAlumno(@RequestBody AlumnoDTOEntradaV3 dto){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		Alumno alumno = new Alumno();
		alumno.setDni(dto.dni());
		alumno.setNombre(dto.nombre());
		alumno.setApellidos(dto.apellidos());
		alumno.setFechanacimiento(dto.fechaNacimiento());
		alumno.setImagen(dto.imagen());
		return ResponseEntity.ok(alumnoService.save(alumno));
	}

	@PutMapping("/update")
	public ResponseEntity<?> updateAlumno(/*@PathVariable("dni") String dni,*/ @RequestBody AlumnoDTOEntradaV3 dto){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		Alumno alumno = new Alumno();
		alumno.setDni(dto.dni());
		alumno.setNombre(dto.nombre());
		alumno.setApellidos(dto.apellidos());
		alumno.setFechanacimiento(dto.fechaNacimiento());
		alumno.setImagen(dto.imagen());
		return ResponseEntity.ok(alumnoService.update(alumno));
	}

	@DeleteMapping("/delete/{dni}")
	public ResponseEntity<?> deleteAlumno(@PathVariable("dni") String dni){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		return ResponseEntity.ok(alumnoService.deleteById(dni));
	}
}
