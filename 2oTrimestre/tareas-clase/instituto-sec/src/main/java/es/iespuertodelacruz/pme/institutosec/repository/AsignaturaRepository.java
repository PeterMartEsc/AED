package es.iespuertodelacruz.pme.institutosec.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface AsignaturaRepository extends JpaRepository<Asignatura, Integer> {

    @Modifying
    @Query(
            value="DELETE FROM asignatura_matricula WHERE idmatricula = :idMatricula",
            nativeQuery = true
    )
    int deleteRelatedMatriculasById(@Param("idMatricula") Integer idMatricula);
    //Borra la relación con una matricula, mediante el id de la asignatura

    @Modifying
    @Query(
            value="DELETE FROM asignaturas WHERE id = :idAsignatura",
            nativeQuery = true
    )
    int deleteByIdNotVoid(@Param("idAsignatura") Integer idAsignatura);
}
