package es.iespuertodelacruz.pme.institutov2.repository;

import es.iespuertodelacruz.pme.institutov2.entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface UsuarioRepository extends JpaRepository<Usuario, String> {

    @Modifying //Consulta que modifica la bbdd
    //"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
    @Query(
            value="SELECT * FROM alumno WHERE dni = :dni",
            nativeQuery = true
    ) //Native Query
    Usuario findUsuarioByDni(@Param("dni") String dni);

    @Modifying //Consulta que modifica la bbdd
    //"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
    @Query(
            value="DELETE FROM usuarios WHERE dni = :dni",
            nativeQuery = true
    ) //Native Query
    int deleteUsuarioBydDni(@Param("dni") String dni);
}
