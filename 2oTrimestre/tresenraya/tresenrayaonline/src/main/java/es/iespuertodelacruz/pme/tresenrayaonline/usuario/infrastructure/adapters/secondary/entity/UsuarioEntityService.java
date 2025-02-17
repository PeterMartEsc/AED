package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary.IUsuarioRepository;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.UsuarioMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class UsuarioEntityService implements IUsuarioRepository {

	@Autowired
    IUsuarioEntityRepository usuarioEntityRepository;

    @Override
    @Transactional
    public Usuario register(Usuario usuario) {
        //Map to usuarioEntity
        UsuarioEntity entity = UsuarioMapper.INSTANCE.usuarioToEntity(usuario);
        
        UsuarioEntity savedEntity = usuarioEntityRepository.save(entity);

        //MAP TO usuario
        Usuario usuarioNotEntity = UsuarioMapper.INSTANCE.entityToUsuario(savedEntity);

        return usuarioNotEntity;
    }

    @Override
    public Usuario login(Usuario usuario) {

        UsuarioEntity entity = UsuarioMapper.INSTANCE.usuarioToEntity(usuario);
        UsuarioEntity foundEntity = usuarioEntityRepository.findByNombre(entity.getNombre());
        Usuario usuarioNotEntity = UsuarioMapper.INSTANCE.entityToUsuario(foundEntity);

        return usuarioNotEntity;
    }

    @Override
    @Transactional
    public Usuario findByNombre(String nombre) {
        UsuarioEntity entity = usuarioEntityRepository.findByNombre(nombre);
        /*if(entity == null){
            System.out.println("El usuario entity tmb es nulo "+nombre);
        }*/
        Usuario usuario = UsuarioMapper.INSTANCE.entityToUsuario(entity);

        return usuario;
    }


}
