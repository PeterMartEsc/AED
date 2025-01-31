package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.primary;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.primary.IPersonaService;

@RestController
@CrossOrigin
@RequestMapping("/api/personas")
public class PersonaRESTController {
	
	@Autowired IPersonaService personaService;
	
	@GetMapping
	ResponseEntity<?> todos(){
		return ResponseEntity.ok( personaService.getAll());
	}
}
