package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.primary;

import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;

public interface IPersonaService {

	List<Persona> getAll();

	//No puede saber de fuera así que atributos
	Persona crearPersona(String nombre, int edad, Integer id);

}
