package es.iespuertodelacruz.pme.institutosec.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import es.iespuertodelacruz.pme.institutosec.entity.Matricula;

public interface MatriculaRepository extends JpaRepository<Matricula, Integer>{
	
	@Modifying
	@Query(
			value="DELETE FROM asignatura_matricula WHERE idMatricula = :idMatricula",
			nativeQuery = true
	)
	int deleteRelatedAsignaturasById(@Param("idMatricula") Integer idMatricula);

	@Modifying
	@Query(
			value="DELETE FROM matriculas WHERE id = :idMatricula",
			nativeQuery = true
	)
	int deleteByIdNotVoid(@Param("idMatricula") Integer idMatricula);

	@Modifying
	@Query(
			value="INSERT INTO asignatura_matricula (idmatricula,idasignatura) " +
					"VALUES ( :idMatricula, :idAsignatura);",
			nativeQuery = true
	)
	int createRelationAsignaturaMatricula(
			@Param("idMatricula") Integer idMatricula,
			@Param("idAsignatura") Integer idAsignatura);
}
