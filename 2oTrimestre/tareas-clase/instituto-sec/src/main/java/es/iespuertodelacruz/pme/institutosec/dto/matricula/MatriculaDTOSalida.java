package es.iespuertodelacruz.pme.institutosec.dto;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;

import java.util.List;

public record MatriculaDTOSalida(
    int id,
    int anio,
    AlumnoDTOEntrada alumno,
    List<AsignaturaDTOEntrada> asignaturas
) {
}
