package es.iespuertodelacruz.pme.gente.infrastructure.adapters.secondary;

import es.iespuertodelacruz.pme.gente.domain.model.Persona;
import es.iespuertodelacruz.pme.gente.domain.ports.secondary.IPersonaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class PersonaEntityService implements IPersonaRepository {

    @Autowired IPersonaEntityRepository repository;

    @Override
    @Transactional
    public Persona save(Persona persona) {
        PersonaEntity personaEntity = new PersonaEntity();
        personaEntity.setNombre(persona.getNombre());
        personaEntity.setEdad(persona.getEdad());
        PersonaEntity save = repository.save(personaEntity);
        return new Persona(save.getId(), save.getNombre(), save.getEdad());
    }
}
