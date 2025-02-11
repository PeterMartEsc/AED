package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;

public class PersonaEntityMapper {
	
	public PersonaEntity toPersistence(Persona p) {
		return new PersonaEntity();
	}
	public Persona toDomain(PersonaEntity pe) {
		return new Persona("ejemplo", 0, 1);
	}

}
