package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOSalidaV3;
import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOSalidaV2;
import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v2/alumnos")
@CrossOrigin
public class AlumnoRESTControllerV2 {
	
	@Autowired AlumnoService alumnoService;
	
	@GetMapping("/")
	public ResponseEntity<?> findAllAlumnos(){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");

		return ResponseEntity.ok(alumnoService.findAll()
			.stream()
			.map(alumno -> new AlumnoDTOSalidaV2(
							alumno.getNombre(), 
							alumno.getApellidos()
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
		AlumnoDTOSalidaV2 dto = new AlumnoDTOSalidaV2(
						alumno.getNombre(),
						alumno.getApellidos()
						);
		return ResponseEntity.ok(dto);
	}

	/*@PostMapping("/create")
	public ResponseEntity<?> createAlumno(@RequestBody AlumnoDTOEntrada dto){
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
	}*/

	/*@PutMapping("/update")
	public ResponseEntity<?> updateAlumno(*//*@PathVariable("dni") String dni,*//* @RequestBody AlumnoDTOEntrada dto){
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
	}*/
}
