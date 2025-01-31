package es.iespuertodelacruz.pme.institutosec.entity;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.Date;


/**
 * The persistent class for the usuarios database table.
 * 
 */
@Entity
@Table(name="usuarios")
@NamedQuery(name="Usuario.findAll", query="SELECT u FROM Usuario u")
public class Usuario implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private int id;
	@Column(length=45, unique=true, nullable=false)
	private String nombre;

	@Column(length=200, nullable=false)
	private String password;

	@Column(length=100, unique=true, nullable=false)
	private String correo;
	@Column(length=45, nullable=false)
	private String rol;

	@Column(nullable=false)
	private int verificado;

	@Column(name="token_verificacion", nullable=false)
	private String tokenVerificacion;

	@Column(name="fecha_creacion", nullable=false)
	@Convert(converter= DateToLongConverter.class)
	private Date fechaCreacion;


	public Usuario() {
	}

	public String getCorreo() {
		return this.correo;
	}

	public void setCorreo(String correo) {
		this.correo = correo;
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public Date getFechaCreacion() {
		return this.fechaCreacion;
	}

	public void setFechaCreacion(Date fechaCreacion) {
		this.fechaCreacion = fechaCreacion;
	}

	public String getNombre() {
		return this.nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getPassword() {
		return this.password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getRol() {
		return this.rol;
	}

	public void setRol(String rol) {
		this.rol = rol;
	}

	public String getTokenVerificacion() {
		return this.tokenVerificacion;
	}

	public void setTokenVerificacion(String tokenVerificacion) {
		this.tokenVerificacion = tokenVerificacion;
	}

	public int getVerificado() {
		return this.verificado;
	}

	public void setVerificado(int verificado) {
		this.verificado = verificado;
	}

}