package es.iespuertodelacruz.pme.institutov2.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import es.iespuertodelacruz.pme.institutov2.entity.Matricula;
import es.iespuertodelacruz.pme.institutov2.service.MatriculaService;


@RestController
@RequestMapping("/api/matriculas")
@CrossOrigin
public class MatriculaRESTController {
	
	@Autowired MatriculaService matriculaService;
	
	@PostMapping
	public ResponseEntity<?> save(@RequestBody Matricula dto){
		return ResponseEntity.ok(matriculaService.save(dto));
	}
}
