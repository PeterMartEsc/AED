package es.iespuertodelacruz.pme.instituto.entity;

import java.io.Serializable;
import jakarta.persistence.*;


/**
 * The persistent class for the historicos database table.
 * 
 */
@Entity
@Table(name="historicos")
@NamedQuery(name="Historico.findAll", query="SELECT h FROM Historico h")
public class Historico implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private int id;

	@Column(nullable=false)
	private float equivalenteeuro;

	@Column(nullable=false, length=20)
	private String fecha;

	//bi-directional many-to-one association to Moneda
	@ManyToOne
	@JoinColumn(name="moneda_id", nullable=false)
	private Moneda moneda;

	public Historico() {
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public float getEquivalenteeuro() {
		return this.equivalenteeuro;
	}

	public void setEquivalenteeuro(float equivalenteeuro) {
		this.equivalenteeuro = equivalenteeuro;
	}

	public String getFecha() {
		return this.fecha;
	}

	public void setFecha(String fecha) {
		this.fecha = fecha;
	}

	public Moneda getMoneda() {
		return this.moneda;
	}

	public void setMoneda(Moneda moneda) {
		this.moneda = moneda;
	}

}