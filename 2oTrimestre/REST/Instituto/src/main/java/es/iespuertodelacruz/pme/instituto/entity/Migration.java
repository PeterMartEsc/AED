package es.iespuertodelacruz.pme.instituto.entity;

import java.io.Serializable;
import jakarta.persistence.*;


/**
 * The persistent class for the migrations database table.
 * 
 */
@Entity
@Table(name="migrations")
@NamedQuery(name="Migration.findAll", query="SELECT m FROM Migration m")
public class Migration implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private int id;

	@Column(nullable=false)
	private int batch;

	@Column(nullable=false, length=255)
	private String migration;

	public Migration() {
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getBatch() {
		return this.batch;
	}

	public void setBatch(int batch) {
		this.batch = batch;
	}

	public String getMigration() {
		return this.migration;
	}

	public void setMigration(String migration) {
		this.migration = migration;
	}

}