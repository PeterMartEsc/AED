package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain;

public class Usuario {

	String nombre;
	String password;
	String correo;
	String rol;

	public Usuario(){

	}

	public Usuario(String nombre, String password, String correo, String rol) {
		this.nombre = nombre;
		this.password = password;
		this.correo = correo;
		this.rol = rol;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getCorreo() {
		return correo;
	}

	public void setCorreo(String correo) {
		this.correo = correo;
	}

	public String getRol() {
		return rol;
	}

	public void setRol(String rol) {
		this.rol = rol;
	}
}
