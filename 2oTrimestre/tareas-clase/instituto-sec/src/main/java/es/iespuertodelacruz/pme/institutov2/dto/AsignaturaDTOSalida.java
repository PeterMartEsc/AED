package es.iespuertodelacruz.pme.institutov2.dto;

import es.iespuertodelacruz.pme.institutov2.entity.Matricula;

import java.util.List;

public record AsignaturaDTOSalida(
        int id,
        String curso,
        String nombre
        //List<Matricula> matriculas

) {
}
