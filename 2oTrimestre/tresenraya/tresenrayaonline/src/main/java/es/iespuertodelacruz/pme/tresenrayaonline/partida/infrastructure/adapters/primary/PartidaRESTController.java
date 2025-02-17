package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.CrearPartidaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.RealizarJugadaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.UnirsePartidaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.primary.IPartidaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@CrossOrigin
@RequestMapping("/api/v2/partidas")
public class PartidaRESTController {

    @Autowired
    IPartidaService partidaService;

    @PostMapping("/crear")
    public ResponseEntity<?> crearPartida(@RequestBody CrearPartidaDto dto){

        boolean creada = partidaService.crearPartida(dto.nombreCreador());

        if(creada){
            return ResponseEntity.ok("Partida creada correctamente");
        } else {
            return ResponseEntity.ok("Ha habido un error al crear la partida");
        }

    }

    //Buscar/unirse a partida
    @PostMapping("/unir")
    public ResponseEntity<?> unirsePartida(@RequestBody UnirsePartidaDto dto) {

        boolean unido = partidaService.unirsePartida(dto.jugador2(), dto.idPartida());

        if(unido){
            return ResponseEntity.ok("Se ha unido correctamente");
        } else {
            return ResponseEntity.ok("Ha habido un error al unirse a la partida");
        }
    }


    //Jugada (actualizar partida) (partida, simbolo, posicionX posicionY)
    // comprueba si es el turno del jugador
    @PostMapping("/jugada")
    public ResponseEntity<?> jugar(@RequestBody RealizarJugadaDto dto) {

        boolean jugadaCorrecta = partidaService.realizarMovimiento(dto.idPartida(), dto.x(), dto.y());

        if(jugadaCorrecta){
            return ResponseEntity.ok("Se ha unido correctamente");
        } else {
            return ResponseEntity.ok("Ha habido un error al unirse a la partida");
        }
    }
}
