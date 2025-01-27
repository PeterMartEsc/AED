package es.iespuertodelacruz.pme.institutov2.dto;

import java.util.Date;
import java.util.List;

import es.iespuertodelacruz.pme.institutov2.entity.Matricula;

public record AlumnoDTOOut(
        String dni,
        String nombre,
        String apellidos,
        Date fechaNacimiento,
        List<Matricula> matriculas,
        String imagen
) {}
