package es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.primary.IProductoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@CrossOrigin
@RequestMapping("/api/personas")
public class ProductoRESTController {
	
	@Autowired
	IProductoService personaService;
	
	@GetMapping
	ResponseEntity<?> todos(){
		return ResponseEntity.ok( personaService.getAll());
	}
}
