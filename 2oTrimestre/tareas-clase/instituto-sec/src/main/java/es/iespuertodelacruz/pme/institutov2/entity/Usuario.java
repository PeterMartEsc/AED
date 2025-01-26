package es.iespuertodelacruz.pme.institutov2.entity;

import jakarta.persistence.*;

import java.io.Serializable;
import java.math.BigInteger;


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
	@Column(unique=true, nullable=false, length=20)
	private String dni;
	@Column(length=45, unique=true, nullable=false)
	private String nombre;

	@Column(length=200, nullable=false)
	private String password;

	@Column(length=100, unique=true, nullable=false)
	private String correo;
	@Column(length=45, nullable=false)
	private String rol;

	private byte verificado;

	@Column(name="token_verificacion")
	private String tokenVerificacion;

	@Column(name="fecha_creacion")
	private BigInteger fechaCreacion;


	public Usuario() {
	}

	public String getCorreo() {
		return this.correo;
	}

	public void setCorreo(String correo) {
		this.correo = correo;
	}

	public String getDni() {
		return this.dni;
	}

	public void setDni(String dni) {
		this.dni = dni;
	}

	public BigInteger getFechaCreacion() {
		return this.fechaCreacion;
	}

	public void setFechaCreacion(BigInteger fechaCreacion) {
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

	public byte getVerificado() {
		return this.verificado;
	}

	public void setVerificado(byte verificado) {
		this.verificado = verificado;
	}

}