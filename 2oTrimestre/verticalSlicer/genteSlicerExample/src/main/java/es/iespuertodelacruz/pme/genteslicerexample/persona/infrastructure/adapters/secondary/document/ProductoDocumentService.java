package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.document;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IProductoRepository;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

public class ProductoDocumentService implements IProductoRepository {

    @Autowired
    es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.document.IProductoDocumentRepository personaDocumentRepository;

    @Override
    public Persona save(Persona persona) {
        return null;
    }

    @Override
    public List<Persona> all() {
        return null;
    }
}
