package es.iespuertodelacruz.pme.institutov2.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import es.iespuertodelacruz.pme.institutov2.entity.Asignatura;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface AsignaturaRepository extends JpaRepository<Asignatura, Integer> {

    @Modifying
    @Query(
            value="DELETE FROM asignatura_matricula WHERE id = :idAsignatura",
            nativeQuery = true
    )
    int deleteRelatedMatriculasById(@Param("idAsignatura") Integer idAsignatura);

    @Modifying
    @Query(
            value="DELETE FROM asignaturas WHERE id = :idAsignatura",
            nativeQuery = true
    )
    int deleteByIdNotVoid(@Param("idAsignatura") Integer idAsignatura);
}
