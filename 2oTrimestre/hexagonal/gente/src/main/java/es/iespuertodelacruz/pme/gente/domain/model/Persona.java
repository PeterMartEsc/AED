package es.iespuertodelacruz.pme.gente.domain.model;

public class Persona {

	private int id;
	private String nombre;
	private int edad;

	public Persona(String nombre, int edad) {
		super();
		this.nombre = nombre;
		this.edad = edad;
	}

	public Persona(int id, String nombre, int edad) {
		super();
		this.id = id;
		this.nombre = nombre;
		this.edad = edad;
	}

	public String getNombre() {
		return nombre;
	}


	public int getEdad() {
		return edad;
	}

	@Override
	public String toString() {
		return "Persona{" +
				"id=" + id +
				", nombre='" + nombre + '\'' +
				", edad=" + edad +
				'}';
	}
}
