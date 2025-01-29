package es.iespuertodelacruz.pme.institutosec.repository;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import java.util.Optional;

public interface UsuarioRepository extends JpaRepository<Usuario, Integer> {


    @Modifying //Consulta que modifica la bbdd
    //"DELETE FROM Alumno a WHERE a.dni = :dni" Usa las entities JQL
    @Query(
            value="DELETE FROM usuarios WHERE id = :id",
            nativeQuery = true
    ) //Native Query
    int deleteByIdNotVoid(@Param("id") Integer id);

    @Query(
            value="SELECT * FROM usuario WHERE nombre = :nombre",
            nativeQuery = true
    ) //Native Query
    Optional<Usuario> findByNombre(@Param("nombre") String nombre);

}
