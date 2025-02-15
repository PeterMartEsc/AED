package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.primary.IUsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@CrossOrigin
@RequestMapping("/api/v1/auth")
public class UsuarioRESTController {
	
	@Autowired
	IUsuarioService usuarioService;
	
	@PostMapping("/login")
	public ResponseEntity<?> login(@RequestBody String nombre, @RequestBody String password){
		return ResponseEntity.ok("ok");
	}

	@PostMapping("/register")
	public ResponseEntity<?> register(@RequestBody String nombre, @RequestBody String password){
		return ResponseEntity.ok("ok");
	}
}
