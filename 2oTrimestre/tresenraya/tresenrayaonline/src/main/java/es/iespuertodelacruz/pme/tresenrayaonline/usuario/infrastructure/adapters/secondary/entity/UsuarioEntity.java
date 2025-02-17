package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashSet;

@Entity
@Table(name="usuarios")
public class UsuarioEntity implements Serializable {

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private Integer id;

	@Column(length=50, nullable=false)
	private String nombre;

	@Column(length=200, nullable=false)
	private String password;

	@Column(length=100, nullable=false)
	private String correo;

	@Column(length=45, nullable=false)
	private String rol;

	public UsuarioEntity() {
	}

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
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
