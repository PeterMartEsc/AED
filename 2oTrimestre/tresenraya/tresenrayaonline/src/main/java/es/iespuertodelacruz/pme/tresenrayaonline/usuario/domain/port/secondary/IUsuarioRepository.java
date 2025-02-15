package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import org.springframework.stereotype.Repository;


@Repository
public interface IUsuarioRepository {
	
	String register(Usuario usuario);

	String login(Usuario usuario);
}
