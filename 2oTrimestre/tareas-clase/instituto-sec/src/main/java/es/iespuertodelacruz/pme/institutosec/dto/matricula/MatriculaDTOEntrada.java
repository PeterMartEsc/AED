package es.iespuertodelacruz.pme.institutosec.dto;

import java.util.List;

public record MatriculaDTOEntrada(
        int id,
        int anio,
        String alumnoDni,
        List<Integer> idsAsignaturas
) {
}
