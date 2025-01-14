package es.iespuertodelacruz.pme.apiloteria.controller;

import es.iespuertodelacruz.pme.apiloteria.domain.Loteria;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

record ApuestaDto (String nombre, int apuesta){}
@RestController
@RequestMapping("/api/loteria")
@CrossOrigin //Evitar el ataque cross origin desde navegador. Permites todo si pones esta etiqueta
public class LoteriaController {

    //Comrpueba la loteria actual
    @GetMapping("/loteria")
    public ResponseEntity<?> estatus(){
        Loteria instanciaLoteria = Loteria.getInstanceToCreate();
        String respuesta = instanciaLoteria.status();
        return ResponseEntity.ok(respuesta);

    }

    //Inicia la loteria
    @GetMapping("/iniciar")
    public ResponseEntity<?> iniciarLoteria(){
        Loteria instanciaLoteria = Loteria.getInstanceToCreate();

        if(instanciaLoteria.iniciarLoteria()){
            return ResponseEntity.ok("Se ha iniciado la loteria "+instanciaLoteria.isActiva());
        } else {
            return ResponseEntity.ok("No se ha podido iniciar la loteria, ya que existe una activa: " + instanciaLoteria.status());
        }

    }

    /*@PathVariable(value = "id") int id*/

    //Apuesta un valor especifico bajo un nombre especifico
    @PostMapping("/apostar")
    public ResponseEntity<?> apostarEnSorteo(@RequestBody ApuestaDto apuestaDto){
        Loteria instanciaLoteria = Loteria.getInstanceToCreate();
        String respuesta = instanciaLoteria.participarLoteria(apuestaDto.nombre(), apuestaDto.apuesta());
        return ResponseEntity.ok(respuesta);
    }
}
