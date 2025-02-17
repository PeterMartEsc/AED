package es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;

public interface IPartidaService {

    boolean crearPartida(String creadorNombre);

    boolean unirsePartida(String creadorNombre, int idPartida);

    boolean realizarMovimiento(int idPartida, int posicionX, int posicionY);
}
