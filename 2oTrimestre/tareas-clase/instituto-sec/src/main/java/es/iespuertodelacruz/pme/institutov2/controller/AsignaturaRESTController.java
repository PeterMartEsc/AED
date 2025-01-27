package es.iespuertodelacruz.pme.institutov2.controller;

import es.iespuertodelacruz.pme.institutov2.dto.AsignaturaDTOSalida;
import es.iespuertodelacruz.pme.institutov2.dto.AsignaturaDTOSalida;
import es.iespuertodelacruz.pme.institutov2.entity.Asignatura;
import es.iespuertodelacruz.pme.institutov2.entity.Asignatura;
import es.iespuertodelacruz.pme.institutov2.service.AsignaturaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/asignaturas")
@CrossOrigin
public class AsignaturaRESTController {

    @Autowired
    AsignaturaService asignaturaService;

    @GetMapping("/")
    public ResponseEntity<?> findAllAsignaturas(){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/asignaturas");

        return ResponseEntity.ok(asignaturaService.findAll()
                        .stream()
                        .map(asignatura -> new AsignaturaDTOSalida(
                                        asignatura.getId(),
                                        asignatura.getNombre(),
                                        asignatura.getCurso(),
                                        asignatura.getMatriculas()
                                )
                            )
                //.collect(Collectors.toList())
        );
    }

    @GetMapping("/{id}")
    public ResponseEntity<?> findAsignaturaById(@PathVariable("id") Integer id){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/asignaturas");
        Asignatura asignatura = asignaturaService.findById(id);
        AsignaturaDTOSalida dto = new AsignaturaDTOSalida(
                asignatura.getId(),
                asignatura.getNombre(),
                asignatura.getCurso(),
                asignatura.getMatriculas()
        );
        return ResponseEntity.ok(dto);
    }
}
