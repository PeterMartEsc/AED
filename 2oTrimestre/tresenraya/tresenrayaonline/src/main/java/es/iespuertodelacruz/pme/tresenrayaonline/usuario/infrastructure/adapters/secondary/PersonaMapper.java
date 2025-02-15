package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity.PersonaEntity;

public class PersonaMapper {
	
	public PersonaEntity toPersistence(Persona p) {
		return new PersonaEntity();
	}
	public Persona toDomain(PersonaEntity pe) {
		return new Persona("ejemplo", 0, 1);
	}

}
