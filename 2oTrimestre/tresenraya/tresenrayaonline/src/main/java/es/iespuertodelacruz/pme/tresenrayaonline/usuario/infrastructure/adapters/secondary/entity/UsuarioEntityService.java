package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary.IUsuarioRepository;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.UsuarioMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class UsuarioEntityService implements IUsuarioRepository {

	@Autowired
    IUsuarioEntityRepository usuarioEntityRepository;

    @Override
    public Usuario register(Usuario usuario) {
        //Map to usuarioEntity
        UsuarioEntity entity = UsuarioMapper.INSTANCE.usuarioToEntity(usuario);
        
        UsuarioEntity savedEntity = usuarioEntityRepository.save(entity);

        //MAP TO usuario
        Usuario usuarioNotEntity = UsuarioMapper.INSTANCE.entityToUsuario(savedEntity);

        return usuarioNotEntity;
    }

    @Override
    public String login(Usuario usuario) {
        return null;
    }
	
	/*@Override
	public Persona save(Persona persona) {
		ProductoMapper mapper = new ProductoMapper();
		PersonaEntity savedEntityEntity = personaEntityRepository.save(mapper.toPersistence(persona));
		return mapper.toDomain(savedEntityEntity);
	}

	@Override
	public List<Persona> all() {
		ProductoMapper mapper = new ProductoMapper();
		List<PersonaEntity> peAll = personaEntityRepository.findAll();
		return new ArrayList<>();
	}*/

}
