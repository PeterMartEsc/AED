package es.iespuertodelacruz.pme.institutosec.entity;

import java.io.Serializable;
import jakarta.persistence.*;
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

	private String correo;

	@Id
	private String dni;

	@Column(name="fecha_creacion")
	private BigInteger fechaCreacion;

	private String nombre;

	private String password;

	private String rol;

	@Column(name="token_verificacion")
	private String tokenVerificacion;

	private byte verificado;

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