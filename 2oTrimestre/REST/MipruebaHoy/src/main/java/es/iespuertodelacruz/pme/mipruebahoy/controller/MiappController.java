package es.iespuertodelacruz.pme.mipruebahoy.controller;

import es.iespuertodelacruz.pme.mipruebahoy.domain.Apuesta;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/acertarnumero")
@CrossOrigin //Evitar el ataque cross origin desde navegador. Permites to-do si pones esta etiqueta
public class MiappController {

    public static class ApuestaDTO{
        int apuesta;

        public int getApuesta() {
            return apuesta;
        }

        public void setApuesta(int apuesta) {
            this.apuesta = apuesta;
        }

        public ApuestaDTO(){}
    }

    @GetMapping
    public ResponseEntity<?> estatus(){
        Apuesta apuesta = Apuesta.getInstance();
        String mensaje = "";

        if(!apuesta.isActiva()){
            mensaje = "La partida no está activa. Hay que generar un secreto: POST /api/acertarnumero";
        } else {
            mensaje = "La partida está activa con secreto entre los numeros: " + apuesta.getMin() + ", " +apuesta.getMax();
        }

        return ResponseEntity.ok(mensaje);
    }

    @PostMapping("/reiniciar")
    public ResponseEntity<?> reiniciar(){
        Apuesta apuesta = Apuesta.getInstance();
        boolean ok = apuesta.iniciarReiniciarPartida();

        if(!ok){
            return ResponseEntity.badRequest().body("El numero tiene que acertarse antes de reiniciar");
        } else {
            return ResponseEntity.ok("Ok. Hay un nuevo secreto entre: " + apuesta.getMin() + ", " +apuesta.getMax());
        }
    }

    @PostMapping("/apuestas")
    public ResponseEntity<?> apostar(@RequestBody ApuestaDTO apuestaDTO){
        Apuesta apuesta = Apuesta.getInstance();
        String mensaje = apuesta.apostar(apuestaDTO.apuesta);
        return ResponseEntity.ok(mensaje);
    }

}
