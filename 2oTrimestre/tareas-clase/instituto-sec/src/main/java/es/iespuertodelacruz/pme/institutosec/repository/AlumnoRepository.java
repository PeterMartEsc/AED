package es.iespuertodelacruz.pme.institutosec.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;

@Repository //No es necesario, pero si por documentacion
public interface AlumnoRepository extends JpaRepository<Alumno, String> {
	
	@Modifying //Consulta que modifica la bbdd
	//"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
	@Query(
			value="DELETE FROM alumnos WHERE dni = :dni",
			nativeQuery = true
			) //Native Query
	int deleteAlumnoBydDni(@Param("dni") String dni);

	//No es necesaria, findById funciona . Modifying Queries can only return void or int/Integer
}
