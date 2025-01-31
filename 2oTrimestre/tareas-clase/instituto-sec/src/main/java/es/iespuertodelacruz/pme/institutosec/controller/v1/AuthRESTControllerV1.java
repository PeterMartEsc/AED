package es.iespuertodelacruz.pme.institutosec.controller.v1;

import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTOLoginV1;
import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTORegisterV1;
import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import es.iespuertodelacruz.pme.institutosec.security.AuthService;
import es.iespuertodelacruz.pme.institutosec.service.MailService;
import es.iespuertodelacruz.pme.institutosec.service.UsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@CrossOrigin
@RequestMapping("/api/v1")
public class AuthRESTControllerV1 {

    @Autowired
    private AuthService authService;
    
    @Autowired
    private UsuarioRepository usuarioRepository;

    @PostMapping("/register/")
    public String register(@RequestBody UsuarioDTORegisterV1 userDto ) {
        //return "recibe: "+u.nombre + " "+ u.password;
        String token = authService.register(userDto.nombre(), userDto.password(), userDto.correo());
        //return ResponseEntity.ok(token);
        return token;
    }

    @PostMapping("/login/")
    public String login(@RequestBody UsuarioDTOLoginV1 userLogin ) {
        //return "recibe: "+u.nombre + " "+ u.password;
        String token = authService.authenticate(userLogin.nombre(), userLogin.password());
        System.out.println(token);
        if ( token == null ) {
            throw new RuntimeException("Credenciales inválidas");
        }
        return token;

    }

    @GetMapping("/confirmacion/")
    public ResponseEntity<?> confirmation (@RequestParam String correo, @RequestParam String token){

        Usuario authUsuario = usuarioRepository.findByCorreo(correo).orElse(null);
        System.out.println("Estoy con el usuario "+authUsuario);
        if(authUsuario != null) {
            String tokenDB = authUsuario.getTokenVerificacion();
            System.out.println("Estoy con el token de la bbdd "+tokenDB);
            if(tokenDB != null && tokenDB.equals(token)) {
                System.out.println("El token es el mismo que la bbdd ");
                authUsuario.setVerificado(1);
                usuarioRepository.save(authUsuario);
                //logger.info("Cuenta verificada");
                return ResponseEntity.ok("Cuenta verificada.");
                
            } else {
                //logger.info("Token de verificacion invalido.");
                return ResponseEntity.status(HttpStatus.BAD_REQUEST).body("Token de verificacion invalido.");
            }
        } else {
            //logger.info("Usuario no encontrado.");
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Usuario no encontrado.");
        }
    }
}
