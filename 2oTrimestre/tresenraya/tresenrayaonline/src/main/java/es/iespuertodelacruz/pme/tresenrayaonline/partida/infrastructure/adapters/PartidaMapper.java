package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.secondary.entity.PartidaEntity;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.UsuarioMapper;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity.UsuarioEntity;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper(uses = {UsuarioMapper.class})
public interface PartidaMapper {

    PartidaMapper INSTANCE = Mappers.getMapper(PartidaMapper.class);

    PartidaEntity partidaToEntity(Partida partida);

    Partida entityToPartida(PartidaEntity entity);

}
