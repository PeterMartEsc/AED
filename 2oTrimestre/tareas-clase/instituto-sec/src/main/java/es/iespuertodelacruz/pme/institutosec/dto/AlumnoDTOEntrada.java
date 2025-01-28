package es.iespuertodelacruz.pme.institutov2.dto;

import es.iespuertodelacruz.pme.institutov2.entity.DateToLongConverter;
import jakarta.persistence.Convert;

import java.util.Date;

public record AlumnoDTOEntrada(
        String dni,
        String nombre,
        String apellidos,
        //@Convert(converter= DateToLongConverter.class)
        Date fechaNacimiento,
        String imagen
) {}
