package es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import java.util.List;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;

public interface IPartidaService {

    Partida crearPartida(String creadorNombre);

    boolean unirsePartida(String creadorNombre, int idPartida);

    boolean realizarMovimiento(int idPartida, int posicionX, int posicionY);

    Partida buscarPartidaById(int id);

    List<Partida> obtenerPartidas();
}
