package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.entity;

import java.util.ArrayList;
import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.PersonaMapper;
import org.springframework.beans.factory.annotation.Autowired;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;
import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IPersonaRepository;

public class PersonaEntityService implements IPersonaRepository{

	@Autowired IPersonaEntityRepository personaEntityRepository;
	
	@Override
	public Persona save(Persona persona) {
		PersonaMapper mapper = new PersonaMapper();
		PersonaEntity savedEntity = personaEntityRepository.save(mapper.toPersistence(persona));
		return mapper.toDomain(savedEntity);
	}

	@Override
	public List<Persona> all() {
		PersonaMapper mapper = new PersonaMapper();
		List<PersonaEntity> peAll = personaEntityRepository.findAll();
		return new ArrayList<>();
	}

}
