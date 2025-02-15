package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain;

public class Usuario {

	String nombre;
	String password;

	String correo;

	public Usuario(String nombre, String password) {
		this.nombre = nombre;
		this.password = password;
	}

	public Usuario(String nombre, String password, String correo) {
		this.nombre = nombre;
		this.password = password;
		this.correo = correo;
	}
}
