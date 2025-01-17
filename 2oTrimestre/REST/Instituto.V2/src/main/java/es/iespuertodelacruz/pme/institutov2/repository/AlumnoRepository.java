package es.iespuertodelacruz.pme.institutov2.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;

public interface AlumnoRepository extends JpaRepository<Alumno, String> {
	
	@Modifying
	@Query(value="DELETE FROM alumno WHERE dni = :dni", nativeQuery = true)
	int deleteAlumnoBydDni(@Param("dni") String dni);
}
