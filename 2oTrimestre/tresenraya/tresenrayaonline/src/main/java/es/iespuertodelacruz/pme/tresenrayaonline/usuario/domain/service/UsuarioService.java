package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.service;

import java.util.Date;
import java.util.List;
import java.util.UUID;

import es.iespuertodelacruz.pme.tresenrayaonline.shared.security.JwtService;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.primary.IUsuarioService;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.secondary.IUsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.stereotype.Service;
@Service
public class UsuarioService implements IUsuarioService {

	@Autowired
	IUsuarioRepository usuarioRepository;

	@Autowired
	private JwtService jwtService;


	@Override
	public String registrar(String nombre, String password, String correo) {
		Usuario usuario = new Usuario();
		usuario.setNombre(nombre);
		usuario.setPassword(password);
		usuario.setCorreo(correo);
		usuario.setRol("ROLE_USER");

		//TODO: set token del correo
		/*String tokenVerifCorreo = UUID.randomUUID().toString();
		usuario.setTokenVerificacion(tokenVerifCorreo);*/
		System.out.println(usuario.getRol());
		Usuario saved = usuarioRepository.register(usuario);

		if( saved != null) {
			/*String senders[] = {"apps.akameterindustries@gmail.com", correo};
			mailService.send(senders, "usuario creado: "+usuario.getNombre(),
					"http://localhost:8080/api/v1/confirmacion/?correo="+usuario.getCorreo()+"&token="+tokenVerifCorreo);*/
			String generatedToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			return generatedToken;
		}else {
			return null;
		}
	}

	@Override
	public String logear(String nombre, String password) {
		Usuario usuario = new Usuario();
		usuario.setNombre(nombre);
		usuario.setPassword(password);
		return usuarioRepository.login(usuario);
	}
}
