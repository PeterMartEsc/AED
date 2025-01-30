package es.iespuertodelacruz.pme.institutosec.security;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.UUID;


@Service
public class AuthService {
	
	
    @Autowired
    private UsuarioRepository usuarioRepository;

    @Autowired
    private JwtService jwtService;

    @Autowired
    private PasswordEncoder passwordEncoder;

    
	public String register(String username, String password, String email) {
		Usuario usuario = new Usuario();
		usuario.setNombre(username);
		usuario.setPassword(passwordEncoder.encode(password));
		usuario.setCorreo(email);
		usuario.setRol("ROLE_USER");

		//TODO: set token del correo
		String tokenVerifCorreo = UUID.randomUUID().toString();
		usuario.setTokenVerificacion(tokenVerifCorreo);

		Date fechaActual = new Date();
		usuario.setFechaCreacion(fechaActual);

		Usuario saved = usuarioRepository.save(usuario);
		
		if( saved != null) {
			String generatedToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			return generatedToken;
		}else {
			return null;
		}
	}    
    


	public String authenticate(String username, String password)  {
		String generatedToken = null;
		Usuario usuario = usuarioRepository.findByNombre(username).orElse(null);
		//System.out.println(usuario.getRol());
		if (usuario != null) {
			if (passwordEncoder.matches(password, usuario.getPassword())) {
				generatedToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			}
		}

		return generatedToken;
	}
}

