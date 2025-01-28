package es.iespuertodelacruz.pme.gente.domain.ports.primary;

import es.iespuertodelacruz.pme.gente.domain.model.Persona;

public interface IPersonaService {

    Persona crear(String nombre, int edad);

}
