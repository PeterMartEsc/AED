package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.primary;

import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;

public interface IPersonaService {
	
	List<Persona> getAll();

	Persona crearPersona(String nombre, int edad, Integer id);
	
}
