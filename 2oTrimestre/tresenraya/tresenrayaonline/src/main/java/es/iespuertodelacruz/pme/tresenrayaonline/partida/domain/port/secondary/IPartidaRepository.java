package es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.secondary;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;

public interface IPartidaRepository {

    Partida savePartida(Partida partida);

    Partida findById(int id);
}
