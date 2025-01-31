package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;
import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IPersonaRepository;

public class PersonaEntityService implements IPersonaRepository{

	@Autowired IPersonaEntityRepository personaEntityRepository;
	
	@Override
	public Persona save(Persona persona) {
		PersonaEntityMapper mapper = new PersonaEntityMapper();
		PersonaEntity savedEntity = personaEntityRepository.save(mapper.toPersistence(persona));
		return mapper.toDomain(savedEntity);
	}

	@Override
	public List<Persona> all() {
		PersonaEntityMapper mapper = new PersonaEntityMapper();
		List<PersonaEntity> peAll = personaEntityRepository.findAll();
		return mapper;
	}

}
