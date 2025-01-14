package es.iespuertodelacruz.pme.instituto.entity;

import java.io.Serializable;
import jakarta.persistence.*;
import java.sql.Timestamp;


/**
 * The persistent class for the tasks database table.
 * 
 */
@Entity
@Table(name="tasks")
@NamedQuery(name="Task.findAll", query="SELECT t FROM Task t")
public class Task implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private long id;

	@Column(nullable=false, length=100)
	private String asunto;

	@Column(name="created_at")
	private Timestamp createdAt;

	@Column(nullable=false)
	private byte terminada;

	@Column(name="updated_at")
	private Timestamp updatedAt;

	public Task() {
	}

	public long getId() {
		return this.id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getAsunto() {
		return this.asunto;
	}

	public void setAsunto(String asunto) {
		this.asunto = asunto;
	}

	public Timestamp getCreatedAt() {
		return this.createdAt;
	}

	public void setCreatedAt(Timestamp createdAt) {
		this.createdAt = createdAt;
	}

	public byte getTerminada() {
		return this.terminada;
	}

	public void setTerminada(byte terminada) {
		this.terminada = terminada;
	}

	public Timestamp getUpdatedAt() {
		return this.updatedAt;
	}

	public void setUpdatedAt(Timestamp updatedAt) {
		this.updatedAt = updatedAt;
	}

}