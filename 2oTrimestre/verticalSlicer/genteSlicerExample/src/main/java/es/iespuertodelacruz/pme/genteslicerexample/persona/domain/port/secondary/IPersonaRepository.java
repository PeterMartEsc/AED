package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary;

import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;

public interface IPersonaRepository {
	
	Persona save(Persona persona);
	
	List<Persona> all();

}
