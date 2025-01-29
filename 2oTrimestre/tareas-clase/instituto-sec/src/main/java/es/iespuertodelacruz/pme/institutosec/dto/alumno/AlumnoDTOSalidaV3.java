package es.iespuertodelacruz.pme.institutosec.dto.alumno;

import java.util.Date;
import java.util.List;

import es.iespuertodelacruz.pme.institutosec.entity.Matricula;

public record AlumnoDTOSalidaV3(
        String dni,
        String nombre,
        String apellidos,
        Date fechaNacimiento,
        List<Matricula> matriculas,
        String imagen
) {}
