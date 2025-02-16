package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity.UsuarioEntity;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper
public interface UsuarioMapper {

    UsuarioMapper INSTANCE = Mappers.getMapper(UsuarioMapper.class);

    UsuarioEntity usuarioToEntity(Usuario usuario);

    Usuario entityToUsuario(UsuarioEntity entity);

}
