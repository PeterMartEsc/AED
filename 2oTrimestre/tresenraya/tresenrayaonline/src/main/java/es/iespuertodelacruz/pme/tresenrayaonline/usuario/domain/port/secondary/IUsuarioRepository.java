package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;


public interface IUsuarioRepository {
	
	Usuario register(Usuario usuario);

	Usuario login(Usuario usuario);

	Usuario findByNombre(String nombre);
}
