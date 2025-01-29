package es.iespuertodelacruz.pme.institutosec.security;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


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
		//usuario.setRol("ROLE_USER");
		usuario.setRol("USER");
		
		Usuario saved = usuarioRepository.save(usuario);
		
		if( saved != null) {
			String generateToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			return generateToken;
		}else {
			return null;
		}
	}    
    
    
    
	public String register(String username, String password) {
		Usuario usuario = new Usuario();
		usuario.setNombre(username);
		usuario.setPassword(passwordEncoder.encode(password));
		usuario.setRol("ROLE_USER");
		
		Usuario saved = usuarioRepository.save(usuario);
		
		if( saved != null) {
			String generateToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			return generateToken;
		}else {
			return null;
		}
	}

	public String authenticate(String username, String password)  {
		String generateToken = null;
		Usuario usuario = usuarioRepository.findByNombre(username).orElse(null);


		if (usuario != null) {
			if (passwordEncoder.matches(password, usuario.getPassword())) {
				generateToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			}
		}
		

		return generateToken;
	}
}

