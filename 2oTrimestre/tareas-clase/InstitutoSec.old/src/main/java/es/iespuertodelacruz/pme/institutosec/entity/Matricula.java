package es.iespuertodelacruz.pme.institutosec.entity;

import java.io.Serializable;
import jakarta.persistence.*;
import java.util.List;


/**
 * The persistent class for the matriculas database table.
 * 
 */
@Entity
@Table(name="matriculas")
@NamedQuery(name="Matricula.findAll", query="SELECT m FROM Matricula m")
public class Matricula implements Serializable {
	private static final long serialVersionUID = 1L;

	private int year;

	//bi-directional many-to-many association to Asignatura
	@ManyToMany(mappedBy="matriculas")
	private List<Asignatura> asignaturas;

	//bi-directional many-to-one association to Alumno
	@ManyToOne
	@JoinColumn(name="dni", referencedColumnName="dni")
	private Alumno alumno;

	public Matricula() {
	}

	public int getYear() {
		return this.year;
	}

	public void setYear(int year) {
		this.year = year;
	}

	public List<Asignatura> getAsignaturas() {
		return this.asignaturas;
	}

	public void setAsignaturas(List<Asignatura> asignaturas) {
		this.asignaturas = asignaturas;
	}

	public Alumno getAlumno() {
		return this.alumno;
	}

	public void setAlumno(Alumno alumno) {
		this.alumno = alumno;
	}

}