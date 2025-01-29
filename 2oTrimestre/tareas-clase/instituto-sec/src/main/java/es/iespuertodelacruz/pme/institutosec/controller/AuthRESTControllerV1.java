package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTOLoginV1;
import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTORegisterV1;
import es.iespuertodelacruz.pme.institutosec.security.AuthService;
import es.iespuertodelacruz.pme.institutosec.service.MailService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@CrossOrigin
@RequestMapping("/api/v1")
public class AuthRESTControllerV1 {

    @Autowired
    private MailService mailService;

    @Autowired
    private AuthService authService;

    @PostMapping("/register")
    public String register(@RequestBody UsuarioDTORegisterV1 userDto ) {
        //return "recibe: "+u.nombre + " "+ u.password;
        String token = authService.register(userDto.nombre(), userDto.password(), userDto.correo());

        String senders[] = {"apps.akameterindustries@gmail.com"};
        mailService.send(senders, "usuario creado", token);
        //return ResponseEntity.ok(token);
        return token;
    }

    @PostMapping("/login")
    public String login(@RequestBody UsuarioDTOLoginV1 userLogin ) {
        //return "recibe: "+u.nombre + " "+ u.password;
        String token = authService.authenticate(userLogin.nombre(), userLogin.password());

        if ( token == null ) {
            throw new RuntimeException("Credenciales inválidas");
        }
        return token;

    }
}
