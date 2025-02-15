package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.service;

import java.util.List;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.primary.IUsuarioService;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary.IUsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.stereotype.Service;

@Service
public class UsuarioService implements IUsuarioService {

	@Autowired
	IUsuarioRepository usuarioRepository;


	@Override
	public String registrar(String nombre, String password, String correo) {
		Usuario usuario = new Usuario(nombre, password, correo);
		return usuarioRepository.register(usuario);
	}

	@Override
	public String logear(String nombre, String password) {
		Usuario usuario = new Usuario(nombre, password);
		return usuarioRepository.login(usuario);
	}
}
