package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.*;
import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.entity.Matricula;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutosec.service.MatriculaService;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;


@RestController
@RequestMapping("/api/matriculas")
@CrossOrigin
public class MatriculaRESTController {
	
	@Autowired MatriculaService matriculaService;

	@GetMapping("/")
	public ResponseEntity<?> findAllMatriculas(){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/asignaturas");

		return ResponseEntity.ok(matriculaService.findAll()
						.stream()
						.map(
							matricula -> new MatriculaDTOSalida(
							matricula.getId(),
							matricula.getAnio(),
							//Crea un nuevo AlumnoDTOEntrada,
							// por que es el que no muestra la lista de matriculas asociada
							new AlumnoDTOEntrada(
									matricula.getAlumno().getDni(),
									matricula.getAlumno().getNombre(),
									matricula.getAlumno().getApellidos(),
									matricula.getAlumno().getFechanacimiento(),
									matricula.getAlumno().getImagen()
							),
							matricula.getAsignaturas()
									.stream().map(
											//Crea un nuevo AsignaturaDTOEntrada,
											// por que es el que no muestra la lista de matriculas asociada
											asignatura -> new AsignaturaDTOEntrada(
											asignatura.getId(),
											asignatura.getCurso(),
											asignatura.getNombre()
											)
									).collect(Collectors.toList())
							)
						)
				//.collect(Collectors.toList())
		);
	}

	@GetMapping("/{id}")
	public ResponseEntity<?> findMatriculaById(@PathVariable("id") Integer id){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/asignaturas");
		Matricula matricula = matriculaService.findById(id);

		MatriculaDTOSalida dto = new MatriculaDTOSalida(
										matricula.getId(),
										matricula.getAnio(),
										//Crea un nuevo AlumnoDTOEntrada,
										// por que es el que no muestra la lista de matriculas asociada
										new AlumnoDTOEntrada(
												matricula.getAlumno().getDni(),
												matricula.getAlumno().getNombre(),
												matricula.getAlumno().getApellidos(),
												matricula.getAlumno().getFechanacimiento(),
												matricula.getAlumno().getImagen()
										),
										matricula.getAsignaturas()
												.stream().map(
														//Crea un nuevo AsignaturaDTOEntrada,
														// por que es el que no muestra la lista de matriculas asociada
														asignatura -> new AsignaturaDTOEntrada(
																asignatura.getId(),
																asignatura.getCurso(),
																asignatura.getNombre()
														)
												).collect(Collectors.toList())
										);
		return ResponseEntity.ok(dto);
	}
	
	@PostMapping
	public ResponseEntity<?> save(@RequestBody MatriculaDTOEntrada dto){

		Matricula matricula = new Matricula();
		matricula.setId(dto.id());
		matricula.setAnio(dto.anio());

		Alumno alumno = new Alumno();
		alumno.setDni(dto.alumnoDni());
		//alumno.setNombre(dto.alumno().nombre());
		//alumno.setApellidos(dto.alumno().apellidos());
		//alumno.setFechanacimiento(dto.alumno().fechaNacimiento());
		//alumno.setImagen(dto.alumno().imagen());
		matricula.setAlumno(alumno);

		List<Asignatura> asignaturas = new ArrayList<>();
		dto.idsAsignaturas().forEach(
				id -> {
					Asignatura asignaturaId = new Asignatura();
					asignaturaId.setId(id);
					//asignaturaEspecifica.setNombre(asignatura.nombre());
					//asignaturaEspecifica.setCurso(asignatura.curso());
					asignaturas.add(asignaturaId);
				}
		);
		matricula.setAsignaturas(asignaturas);

		return ResponseEntity.ok(matriculaService.save(matricula));
	}

	@DeleteMapping("/delete/{id}")
	public ResponseEntity<?> deleteMatricula(@PathVariable("id") Integer id){
		//Logger logger = Logger.getLogger("logger");
		//Logger logger = Logger.getLogger(Globals.LOGGER);
		//logger.info("Llamada al find all get /api/alumnos");
		return ResponseEntity.ok(matriculaService.deleteById(id));
	}
}
