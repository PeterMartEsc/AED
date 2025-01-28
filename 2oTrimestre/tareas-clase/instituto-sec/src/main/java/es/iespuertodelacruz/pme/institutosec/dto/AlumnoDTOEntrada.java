package es.iespuertodelacruz.pme.institutosec.dto;

import java.util.Date;

public record AlumnoDTOEntrada(
        String dni,
        String nombre,
        String apellidos,
        //@Convert(converter= DateToLongConverter.class)
        Date fechaNacimiento,
        String imagen
) {}
