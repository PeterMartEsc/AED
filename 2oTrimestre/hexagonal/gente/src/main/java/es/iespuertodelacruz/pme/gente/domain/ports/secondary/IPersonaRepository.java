package es.iespuertodelacruz.pme.gente.domain.ports.secondary;

import es.iespuertodelacruz.pme.gente.domain.model.Persona;
import org.springframework.stereotype.Repository;

@Repository
public interface IPersonaRepository {

    Persona save(Persona persona);
}
