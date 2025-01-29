package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTOEntradaV1;
import es.iespuertodelacruz.pme.institutosec.security.AuthService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

public class AuthRESTControllerV1 {


    @Autowired
    private MailService mailService;

    @Autowired
    private AuthService authService;

    @PostMapping("/register")
    public String register(@RequestBody UsuarioDTOEntradaV1 userDto ) {
        //return "recibe: "+u.nombre + " "+ u.password;
        String token = authService.register(userDto.nombre(), userDto.password(), userDto.correo());


        String senders[] = {"apps.akameterindustries@gmail.com"};
        mailService.send(senders, "usuario creado", token);
        //return ResponseEntity.ok(token);
        return token;

    }
}
