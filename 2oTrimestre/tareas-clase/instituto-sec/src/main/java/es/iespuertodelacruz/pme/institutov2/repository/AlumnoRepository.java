package es.iespuertodelacruz.pme.institutov2.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;

@Repository //No es necesario, pero si por documentacion
public interface AlumnoRepository extends JpaRepository<Alumno, String> {
	
	@Modifying //Consulta que modifica la bbdd
	//"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
	@Query(
			value="DELETE FROM alumno WHERE dni = :dni", 
			nativeQuery = true
			) //Native Query
	int deleteAlumnoBydDni(@Param("dni") String dni);
}
