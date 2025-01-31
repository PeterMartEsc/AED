package es.iespuertodelacruz.pme.institutosec.controller.v2;


import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOSalidaV2;
import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.stream.Collectors;

@RestController
@RequestMapping("/api/v2/alumnos")
@CrossOrigin
public class AlumnoRESTControllerV2 {
	
	@Autowired AlumnoService alumnoService;

	@GetMapping
	//@PreAuthorize("hasRole('ROLE_USER') or hasRole('ROLE_ADMIN')")
	public ResponseEntity<?> findAllAlumnos(){
		//return ResponseEntity.ok("entra");
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		//System.out.println("HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
		return ResponseEntity.ok(alumnoService.findAll()
			.stream()
			.map(alumno -> new AlumnoDTOSalidaV2(
							alumno.getNombre(), 
							alumno.getApellidos()
							)
				)
			.collect(Collectors.toList())
		);

	}

	@GetMapping("/{dni}")
	public ResponseEntity<?> findAlumnoByDni(@PathVariable String dni){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		Alumno alumno = alumnoService.findById(dni);
		if(alumno == null){
			throw new RuntimeException("El alumno con dni" + dni +"no existe");
		}
		AlumnoDTOSalidaV2 dto = new AlumnoDTOSalidaV2(
						alumno.getNombre(),
						alumno.getApellidos()
						);
		return ResponseEntity.ok(dto);
	}
}
