package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.CrearPartidaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.RealizarJugadaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.dto.UnirsePartidaDto;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.primary.IPartidaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@CrossOrigin
@RequestMapping("/api/v2/partidas")
public class PartidaRESTController {

    @Autowired
    IPartidaService partidaService;

    @GetMapping
    public ResponseEntity<?> getAllPartidas() {

        List<Partida> partidas = partidaService.obtenerPartidas();

        return ResponseEntity.ok(partidas);

    }

    @GetMapping("/{id}")
    public ResponseEntity<?> findPartidaById(@PathVariable int id) {

        Partida partidaBuscada = partidaService.buscarPartidaById(id);

        if(partidaBuscada != null){
            return ResponseEntity.ok(partidaBuscada);
        } else {
            return ResponseEntity.ok("Ha habido un error al buscar la partida");
        }
    }

    @PostMapping("/crear")
    public ResponseEntity<?> crearPartida(@RequestBody CrearPartidaDto dto){
        System.out.println("yepaleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"+dto.nombreCreador());
        Partida creada = partidaService.crearPartida(dto.nombreCreador());

        if(creada != null){
            return ResponseEntity.ok(creada);
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
        System.out.println("YYYYYYYYYYYYYYYYYYYEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEPAAAAAAAAAAA"+dto);
        boolean jugadaCorrecta;
        try{
            jugadaCorrecta = partidaService.realizarMovimiento(dto.idPartida(), dto.x(), dto.y());
        } catch(Error e){
            throw new RuntimeException("Error "+e);
        }

        if(jugadaCorrecta){
            return ResponseEntity.ok("Se ha realizado la jugada correctamente");
        } else {
            return ResponseEntity.ok("Ha habido un error al hacer la jugada");
        }
    }
}
