package es.iespuertodelacruz.pme.institutosec.controller.v2;

import es.iespuertodelacruz.pme.institutosec.dto.asignatura.AsignaturaDTOSalidaV2;
import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.service.AsignaturaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v2/asignaturas")
@CrossOrigin
public class AsignaturaRESTControllerV2 {

    @Autowired
    AsignaturaService asignaturaService;

    @GetMapping("/")
    public ResponseEntity<?> findAllAsignaturas(){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/asignaturas");

        return ResponseEntity.ok(asignaturaService.findAll()
                        .stream()
                        .map(asignatura -> new AsignaturaDTOSalidaV2(
                                        //asignatura.getId(),
                                        asignatura.getNombre(),
                                        asignatura.getCurso()
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
        AsignaturaDTOSalidaV2 dto = new AsignaturaDTOSalidaV2(
                //asignatura.getId(),
                asignatura.getNombre(),
                asignatura.getCurso()
        );
        return ResponseEntity.ok(dto);
    }
}
