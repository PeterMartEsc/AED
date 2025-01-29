package es.iespuertodelacruz.pme.institutosec.dto.alumno;

import java.util.Date;

public record AlumnoDTOEntradaV3(
        String dni,
        String nombre,
        String apellidos,
        //@Convert(converter= DateToLongConverter.class)
        Date fechaNacimiento,
        String imagen
) {}
