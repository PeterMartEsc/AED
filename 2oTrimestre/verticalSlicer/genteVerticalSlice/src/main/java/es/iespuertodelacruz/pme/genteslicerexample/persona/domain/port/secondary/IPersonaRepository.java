package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary;

import java.util.List;

public interface IPersonaRepository {
	
	Persona save(Persona persona);
	
	List<Persona> all();

}
