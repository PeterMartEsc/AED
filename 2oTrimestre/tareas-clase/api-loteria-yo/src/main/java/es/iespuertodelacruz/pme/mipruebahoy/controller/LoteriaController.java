package es.iespuertodelacruz.pme.mipruebahoy.controller;

import es.iespuertodelacruz.pme.mipruebahoy.domain.Loteria;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/loteria")
@CrossOrigin //Evitar el ataque cross origin desde navegador. Permites todo si pones esta etiqueta
public class LoteriaController {


    @GetMapping("/estatus")
    public ResponseEntity<?> estatus(){
        Loteria ins = Loteria.getInstanceToCreate();
        String respuesta = ins.status();
        return ResponseEntity.ok(respuesta);

    }

    @GetMapping("/iniciar")
    public ResponseEntity<?> mostrarSorteoById(/*@PathVariable(value = "id") int id*/){
        Loteria ins = Loteria.getInstanceToCreate();

        if(ins.iniciarApuesta()){
            return ResponseEntity.ok("Se ha iniciado la loteria "+ins.isActiva());
        } else {
            return ResponseEntity.ok("No se ha podido iniciar la loteria, ya que existe una activa");
        }

    }

}
