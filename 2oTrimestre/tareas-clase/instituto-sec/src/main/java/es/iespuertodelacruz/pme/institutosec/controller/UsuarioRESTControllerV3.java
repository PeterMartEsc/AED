package es.iespuertodelacruz.pme.institutosec.controller;

import es.iespuertodelacruz.pme.institutosec.dto.UsuarioDTOv3;
import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.service.UsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/usuarios")
@CrossOrigin
public class UsuarioRESTController {
    @Autowired
    UsuarioService usuarioService;

    @GetMapping("/")
    public ResponseEntity<?> findAllUsuarios(){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/alumnos");

        return ResponseEntity.ok(usuarioService.findAll()
                        .stream()
                        .map(usuario -> new UsuarioDTOv3(
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
        UsuarioDTOv3 dto = new UsuarioDTOv3(
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

    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> deleteAlumno(@PathVariable("id") Integer id){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/alumnos");
        return ResponseEntity.ok(usuarioService.deleteById(id));
    }
}
