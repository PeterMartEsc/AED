package es.iespuertodelacruz.pme.institutosec.dto;

import java.util.List;

public record MatriculaDTOEntrada(
        int id,
        int anio,
        AlumnoDTOEntrada alumno,
        List<AsignaturaDTOEntrada> asignaturas
) {
}
