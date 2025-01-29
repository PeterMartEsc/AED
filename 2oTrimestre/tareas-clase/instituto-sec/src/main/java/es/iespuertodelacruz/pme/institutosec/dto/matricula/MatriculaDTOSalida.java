package es.iespuertodelacruz.pme.institutosec.dto.matricula;

import es.iespuertodelacruz.pme.institutosec.dto.alumno.AlumnoDTOEntradaV3;
import es.iespuertodelacruz.pme.institutosec.dto.asignatura.AsignaturaDTOEntrada;

import java.util.List;

public record MatriculaDTOSalida(
    int id,
    int anio,
    AlumnoDTOEntradaV3 alumno,
    List<AsignaturaDTOEntrada> asignaturas
) {
}
