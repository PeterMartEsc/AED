package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.document;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;
import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IPersonaRepository;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

public class PersonaDocumentService implements IPersonaRepository {

    @Autowired IPersonaDocumentRepository personaDocumentRepository;

    @Override
    public Persona save(Persona persona) {
        return null;
    }

    @Override
    public List<Persona> all() {
        return null;
    }
}
