package es.iespuertodelacruz.pme.institutosec.controller.v3;

import es.iespuertodelacruz.pme.institutosec.dto.asignatura.AsignaturaDTOEntrada;
import es.iespuertodelacruz.pme.institutosec.dto.asignatura.AsignaturaDTOSalidaV2;
import es.iespuertodelacruz.pme.institutosec.dto.asignatura.AsignaturaDTOSalidaV3;
import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.service.AsignaturaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v3/asignaturas")
@CrossOrigin
public class AsignaturaRESTControllerV3 {

    @Autowired
    AsignaturaService asignaturaService;

    @GetMapping("/")
    public ResponseEntity<?> findAllAsignaturas(){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/asignaturas");

        return ResponseEntity.ok(asignaturaService.findAll()
                        .stream()
                        .map(asignatura -> new AsignaturaDTOSalidaV3(
                                        asignatura.getId(),
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
        AsignaturaDTOSalidaV3 dto = new AsignaturaDTOSalidaV3(
                asignatura.getId(),
                asignatura.getNombre(),
                asignatura.getCurso()
        );
        return ResponseEntity.ok(dto);
    }

    @PostMapping("/create")
    public ResponseEntity<?> createAsignatura(@RequestBody AsignaturaDTOEntrada dto){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/alumnos");
        Asignatura asignatura = new Asignatura();
        asignatura.setId(dto.id());
        asignatura.setNombre(dto.nombre());
        asignatura.setCurso(dto.curso());
        
        return ResponseEntity.ok(asignaturaService.save(asignatura));
    }

    @PutMapping("/update")
    public ResponseEntity<?> updateAsignatura( @RequestBody AsignaturaDTOEntrada dto){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/alumnos");
        Asignatura asignatura = new Asignatura();
        asignatura.setId(dto.id());
        asignatura.setNombre(dto.nombre());
        asignatura.setCurso(dto.curso());

        return ResponseEntity.ok(asignaturaService.update(asignatura));
    }

    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> deleteAsignatura(@PathVariable("id") Integer id){
        //Logger logger = Logger.getLogger("logger");
        //Logger logger = Logger.getLogger(Globals.LOGGER);
        //logger.info("Llamada al find all get /api/alumnos");
        return ResponseEntity.ok(asignaturaService.deleteById(id));
    }
}
