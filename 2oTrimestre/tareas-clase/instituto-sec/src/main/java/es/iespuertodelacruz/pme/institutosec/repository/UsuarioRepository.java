package es.iespuertodelacruz.pme.institutosec.repository;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface UsuarioRepository extends JpaRepository<Usuario, Integer> {

    /*@Modifying //Consulta que modifica la bbdd
    //"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
    @Query(
            value="SELECT * FROM alumno WHERE dni = :dni",
            nativeQuery = true
    ) //Native Query
    Usuario findUsuarioByDni(@Param("dni") String dni);*/
    //No es necesaria, findById funciona. Modifying Queries can only return void or int/Integer

    @Modifying //Consulta que modifica la bbdd
    //"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
    @Query(
            value="DELETE FROM usuarios WHERE id = :id",
            nativeQuery = true
    ) //Native Query
    int deleteByIdNotVoid(@Param("id") Integer id);

}
