package es.iespuertodelacruz.pme.institutov2.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import es.iespuertodelacruz.pme.institutov2.entity.Matricula;

public interface MatriculaRepository extends JpaRepository<Matricula, Integer>{
	
	@Modifying
	@Query(
			value="DELETE FROM asignatura_matricula WHERE id = :idMatricula",
			nativeQuery = true
	)
	int deleteRelatedAsignaturasById(@Param("idMatricula") Integer idMatricula);

	@Modifying
	@Query(
			value="DELETE FROM matriculas WHERE id = :idMatricula",
			nativeQuery = true
	)
	int deleteByIdNotVoid(@Param("idMatricula") Integer idMatricula);
}
