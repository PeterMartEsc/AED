package es.iespuertodelacruz.pme.instituto.entity;

import java.io.Serializable;
import jakarta.persistence.*;
import java.util.List;


/**
 * The persistent class for the monedas database table.
 * 
 */
@Entity
@Table(name="monedas")
@NamedQuery(name="Moneda.findAll", query="SELECT m FROM Moneda m")
public class Moneda implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private int id;

	@Column(nullable=false, length=50)
	private String nombre;

	@Column(nullable=false, length=50)
	private String pais;

	//bi-directional many-to-one association to Historico
	@OneToMany(mappedBy="moneda")
	private List<Historico> historicos;

	public Moneda() {
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getNombre() {
		return this.nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getPais() {
		return this.pais;
	}

	public void setPais(String pais) {
		this.pais = pais;
	}

	public List<Historico> getHistoricos() {
		return this.historicos;
	}

	public void setHistoricos(List<Historico> historicos) {
		this.historicos = historicos;
	}

	public Historico addHistorico(Historico historico) {
		getHistoricos().add(historico);
		historico.setMoneda(this);

		return historico;
	}

	public Historico removeHistorico(Historico historico) {
		getHistoricos().remove(historico);
		historico.setMoneda(null);

		return historico;
	}

}