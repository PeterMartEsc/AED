package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.dto.LoginDto;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.dto.RegisterDto;
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
	public ResponseEntity<?> login(@RequestBody LoginDto dto){
		String token = usuarioService.logear(dto.nombre(), dto.password());

		return ResponseEntity.ok(token);
	}

	@PostMapping("/register")
	public ResponseEntity<?> register(@RequestBody RegisterDto dto){

		String token = usuarioService.registrar(dto.nombre(), dto.password(), dto.correo());

		if(token == null){
			throw new RuntimeException("El token es nulo");
		}
		return ResponseEntity.ok(token);
	}
}
