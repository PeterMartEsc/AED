package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.*;
import es.iespuertodelacruz.pme.institutosec.entity.Matricula;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutosec.entity.Matricula;
import es.iespuertodelacruz.pme.institutosec.service.MatriculaService;

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
	public ResponseEntity<?> save(@RequestBody Matricula dto){
		return ResponseEntity.ok(matriculaService.save(dto));
	}
}
