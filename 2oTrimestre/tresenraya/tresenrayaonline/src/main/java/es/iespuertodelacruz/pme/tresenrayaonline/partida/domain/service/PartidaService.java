package es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.service;

import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;
import java.io.IOException;
import java.util.Random;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.primary.IPartidaService;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.secondary.IPartidaRepository;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary.IUsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


@Service
public class PartidaService implements IPartidaService {

    @Autowired IPartidaRepository partidaRepository;
    @Autowired IUsuarioRepository usuarioRepository;

    @Override
    public boolean crearPartida(String creadorNombre) {

        Usuario usuarioByName = usuarioRepository.findByNombre(creadorNombre);
        System.out.println(usuarioByName.getNombre());

        Partida partida = new Partida();
        partida.setJugador1(usuarioByName);

        // partida.setJugador2(null);

        String[][] contenido = {
                {" ", " ", " "},
                {" ", " ", " "},
                {" ", " ", " "}
        };

        ObjectMapper objectMapper = new ObjectMapper();
        String jsonString;

        try {
            jsonString = objectMapper.writeValueAsString(contenido);
        } catch (JsonProcessingException e) {
            throw new RuntimeException(e);
        }

        partida.setContenido(jsonString);
        // partida.setTurno(null);
        // partida.setGanador(null);

        Partida partidaSaved = partidaRepository.savePartida(partida);
        System.out.println(partidaSaved.getJugador1() +" "+ partidaSaved.getJugador2());
        if(partidaSaved != null){
            return true;
        } else {
            return false;
        }

    }

    @Override
    public boolean unirsePartida(String creadorNombre, int idPartida) {

        Usuario usuarioByName = usuarioRepository.findByNombre(creadorNombre);
        Partida partidaUnirse = partidaRepository.findById(idPartida);
        partidaUnirse.setJugador2(usuarioByName);

        Random random = new Random();
        int randomNumber = random.nextInt(2);
        partidaUnirse.setTurno(randomNumber == 0 ? partidaUnirse.getJugador1() : partidaUnirse.getJugador2());

        Partida partidaDosJugadores = partidaRepository.savePartida(partidaUnirse);

        if(partidaDosJugadores != null){
            return true;
        } else {
            return false;
        }
    }

    @Override
    public boolean realizarMovimiento(int idPartida, int posicionX, int posicionY) {
        Partida partidaJugada = partidaRepository.findById(idPartida);
        String signo = "";

        if(partidaJugada.getTurno() == partidaJugada.getJugador1()) {
            signo = "X";
        } else {
            signo = "0";
        }

        ObjectMapper objectMapper = new ObjectMapper();
        String[][] contenidoJson;
        try {
            contenidoJson = objectMapper.readValue(partidaJugada.getContenido(), String[][].class);
        } catch (JsonProcessingException e) {
            throw new RuntimeException(e);
        }

        contenidoJson[posicionX][posicionY] = signo;

        boolean hayGanador = comprobarGanador(contenidoJson);
        if(hayGanador){
            partidaJugada.setGanador(partidaJugada.getTurno());
        }

        String contenidoString;
        try {
            contenidoString = objectMapper.writeValueAsString(contenidoJson);
        } catch (JsonProcessingException e) {
            throw new RuntimeException(e);
        }

        partidaJugada.setContenido(contenidoString);
        partidaJugada.setTurno(partidaJugada.getTurno() == partidaJugada.getJugador1() ?
                partidaJugada.getJugador2() : partidaJugada.getJugador1());

        Partida partidaActualizada = partidaRepository.savePartida(partidaJugada);

        return false;
    }

    private boolean comprobarGanador(String[][] contenidoJson){
        
        for (int i = 0; i < 3; i++) {
            if (!contenidoJson[i][0].equals(" ") && contenidoJson[i][0].equals(contenidoJson[i][1]) && contenidoJson[i][1].equals(contenidoJson[i][2])) {
                return true;
            }
            if (contenidoJson[0][i].equals(" ") && contenidoJson[0][i].equals(contenidoJson[1][i]) && contenidoJson[1][i].equals(contenidoJson[2][i])) {
                return true;
            }
        }

        // Revisa las diagonales
        if (contenidoJson[0][0].equals(" ") && contenidoJson[0][0].equals(contenidoJson[1][1])  && contenidoJson[1][1].equals(contenidoJson[2][2]) ) {
            return true;
        }
        if (contenidoJson[0][2].equals(" ") && contenidoJson[0][2].equals(contenidoJson[1][1])  && contenidoJson[1][1].equals(contenidoJson[2][0]) ) {
            return true;
        }

        return false;
    }




    /*
        import com.fasterxml.jackson.databind.ObjectMapper;
        import java.io.IOException;

        class Partida {
            public String[][] contenido; // JSON almacenado como array bidimensional
        }

        public class Main {
            public static void main(String[] args) throws IOException {
                String jsonString = "[[\"X\",\"X\",\"X\"],[\"X\",\"0\",\"0\"],[\"0\",\"X\",\"0\"]]";

                ObjectMapper objectMapper = new ObjectMapper();
                String[][] contenido = objectMapper.readValue(jsonString, String[][].class);

                System.out.println(contenido[0][0]); // X
            }
        }

     */

    /*
    import com.fasterxml.jackson.databind.ObjectMapper;

    public class Main {
        public static void main(String[] args) throws Exception {
            String[][] contenido = {
                    {"X", "X", "X"},
                    {"X", "0", "0"},
                    {"0", "X", "0"}
            };

            ObjectMapper objectMapper = new ObjectMapper();
            String jsonString = objectMapper.writeValueAsString(contenido);

            System.out.println(jsonString); // [["X","X","X"],["X","0","0"],["0","X","0"]]
        }
    }
    */

}
