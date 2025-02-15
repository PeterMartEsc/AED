package es.iespuertodelacruz.pme.tresenrayaonline.shared.security;

import org.springframework.stereotype.Service;

@Service
public class AuthService {
	
	/*
    @Autowired
    private UsuarioRepository usuarioRepository;

    @Autowired
    private JwtService jwtService;

    @Autowired
    private PasswordEncoder passwordEncoder;

	@Autowired
	private MailService mailService;

    
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
			String senders[] = {"apps.akameterindustries@gmail.com", email};
			mailService.send(senders, "usuario creado: "+usuario.getNombre(),
					"http://localhost:8080/api/v1/confirmacion/?correo="+usuario.getCorreo()+"&token="+tokenVerifCorreo);
			String generatedToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			return generatedToken;
		}else {
			return null;
		}
	}    
    


	public String authenticate(String username, String password)  {
		String generatedToken = null;
		Usuario usuario = usuarioRepository.findByNombre(username).orElse(null);
		System.out.println(usuario.getNombre());
		if (usuario != null) {
			System.out.println("no es nulo");
			if (passwordEncoder.matches(password, usuario.getPassword())) {
				System.out.println("tiene contraseña");
				generatedToken = jwtService.generateToken(usuario.getNombre(), usuario.getRol());
			}
		}

		return generatedToken;
	}*/
}

