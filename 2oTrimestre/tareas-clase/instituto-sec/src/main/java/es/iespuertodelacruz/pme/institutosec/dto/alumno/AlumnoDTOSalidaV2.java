package es.iespuertodelacruz.pme.institutosec.dto.alumno;

import es.iespuertodelacruz.pme.institutosec.entity.Matricula;

import java.util.Date;
import java.util.List;

public record AlumnoDTOSalidaV2(
        String nombre,
        String apellidos
) {}
