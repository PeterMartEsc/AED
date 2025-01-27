package es.iespuertodelacruz.pme.institutov2.dto;

import es.iespuertodelacruz.pme.institutov2.entity.DateToLongConverter;
import es.iespuertodelacruz.pme.institutov2.entity.Matricula;
import jakarta.persistence.Convert;

import java.util.Date;
import java.util.List;

public record AlumnoDTOIn(
        String dni,
        String nombre,
        String apellidos,
        Date fechaNacimiento,
        String imagen
) {}
