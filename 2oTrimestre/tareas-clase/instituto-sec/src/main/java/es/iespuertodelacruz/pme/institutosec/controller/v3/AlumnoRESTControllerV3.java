package es.iespuertodelacruz.pme.institutosec.controller.v3;

import com.fasterxml.jackson.databind.ObjectMapper;
import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOEntradaV3;
import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOSalidaV3;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

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

	@PostMapping(value="/create/foto", consumes = {MediaType.MULTIPART_FORM_DATA_VALUE})
	//@PreAuthorize("hasRol('ROLE_ADMIN')")
	public ResponseEntity<?> add(
			@RequestPart(value = "alumno") String alumnoJSON,
			@RequestPart(value = "foto", required = false) MultipartFile foto) throws IOException {
		//System.out.println("Entro por aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii");
		if (alumnoJSON == null || alumnoJSON.isEmpty()) {
			return ResponseEntity.badRequest().body("El alumno no puede ser nulo");
		}

		ObjectMapper objectMapper = new ObjectMapper();
		AlumnoDTOEntradaV3 dto;

		try {
			dto = objectMapper.readValue(alumnoJSON, AlumnoDTOEntradaV3.class);
		} catch (Exception e) {

			return ResponseEntity.badRequest()
					.body("Error al mapear a dto");
		}
		//System.out.println("Paso por aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii");
		if (dto == null) {
			return ResponseEntity.badRequest()
					.body("Error, el dto es nulo");
		}

		if (alumnoService.findById(dto.dni()) != null) {
			return ResponseEntity.status(HttpStatus.CONFLICT).body("El alumno ya existe");
		}

		Alumno alumno = new Alumno();
		alumno.setDni(dto.dni());
		alumno.setNombre(dto.nombre());
		alumno.setApellidos(dto.apellidos());
		alumno.setFechanacimiento(dto.fechaNacimiento());


		if (foto != null && !foto.isEmpty()) {

			String nombreOriginal = foto.getOriginalFilename();

			// Extraer la extensión del archivo (ejemplo: .jpg, .png)
			String extension = "";
			if (nombreOriginal != null && nombreOriginal.contains(".")) {
				extension = nombreOriginal.substring(nombreOriginal.lastIndexOf("."));
			}

			String nombreArchivo = dto.dni() + "_foto" + extension;
			Path rutaFoto = Paths.get("./src/main/resources/fotos/", nombreArchivo);
			Files.createDirectories(rutaFoto.getParent());
			Files.write(rutaFoto, foto.getBytes());

			alumno.setImagen(rutaFoto.toString());
		}

		Alumno saved = alumnoService.save(alumno);
		AlumnoDTOSalidaV3 dtoSalida = new AlumnoDTOSalidaV3(saved.getDni(), saved.getNombre(),
				saved.getApellidos(), saved.getFechanacimiento(), saved.getMatriculas(), saved.getImagen());

		return ResponseEntity.status(HttpStatus.CREATED)
				.body("Alumno con foto creado");
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
