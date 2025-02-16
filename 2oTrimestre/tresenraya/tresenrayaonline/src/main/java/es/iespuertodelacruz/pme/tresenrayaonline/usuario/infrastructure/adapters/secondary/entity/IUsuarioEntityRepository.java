package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

@Repository
public interface IUsuarioEntityRepository extends JpaRepository<UsuarioEntity, Integer>{

    @Query(
            value="SELECT * FROM usuarios WHERE nombre = :nombre",
            nativeQuery = true
    ) //Native Query
    UsuarioEntity findByNombre(@Param("nombre") String nombre);
}
