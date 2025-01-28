package es.iespuertodelacruz.pme.gente.domain.service;

import es.iespuertodelacruz.pme.gente.domain.model.Persona;
import es.iespuertodelacruz.pme.gente.domain.ports.primary.IPersonaService;
import es.iespuertodelacruz.pme.gente.domain.ports.secondary.IPersonaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class PersonaDomainService implements IPersonaService {

    @Autowired IPersonaRepository repository;

    @Override
    public Persona crear(String nombre, int edad) {
        Persona  persona = new Persona(nombre, edad);
        return repository.save(persona);
    }
}
