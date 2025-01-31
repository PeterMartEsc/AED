package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTOEntradaV3;
import es.iespuertodelacruz.pme.institutosec.dto.usuario.UsuarioDTOSalidaV3;
import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.service.UsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.Date;

@RestController
@RequestMapping("/api/v3/usuarios")
@CrossOrigin
public class UsuarioRESTControllerV3 {
    @Autowired
    UsuarioService usuarioService;

    @GetMapping("/")
    public ResponseEntity<?> findAllUsuarios(){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/usuarios");

        return ResponseEntity.ok(usuarioService.findAll()
                        .stream()
                        .map(usuario -> new UsuarioDTOSalidaV3(
                                        usuario.getId(),
                                        usuario.getNombre(),
                                        usuario.getCorreo(),
                                        usuario.getRol(),
                                        usuario.getVerificado(),
                                        usuario.getTokenVerificacion(),
                                        usuario.getFechaCreacion()
                                )
                        )
                //.collect(Collectors.toList())
        );
    }

    @GetMapping("/{id}")
    public ResponseEntity<?> findUsuarioById(@PathVariable("id") Integer id){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/asuarios");
        Usuario usuario = usuarioService.findById(id);
        UsuarioDTOSalidaV3 dto = new UsuarioDTOSalidaV3(
                usuario.getId(),
                usuario.getNombre(),
                usuario.getCorreo(),
                usuario.getRol(),
                usuario.getVerificado(),
                usuario.getTokenVerificacion(),
                usuario.getFechaCreacion()

        );
        return ResponseEntity.ok(dto);
    }

    @PostMapping("/create")
    public ResponseEntity<?> createUsuario(@RequestBody UsuarioDTOEntradaV3 dto){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/usuarios");
        Usuario usuario = new Usuario();
        //usuario.setId(dto.id());
        usuario.setNombre(dto.nombre());
        usuario.setCorreo(dto.correo());
        usuario.setPassword(dto.password());
        usuario.setRol(dto.rol());
        //usuario.setVerificado(0);
        //usuario.setTokenVerificacion();
        Date fechaActual = new Date();
        usuario.setFechaCreacion(fechaActual);
        return ResponseEntity.ok(usuarioService.save(usuario));
    }

    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> deleteUsuario(@PathVariable("id") Integer id){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/usuarios");
        return ResponseEntity.ok(usuarioService.deleteById(id));
    }
}
