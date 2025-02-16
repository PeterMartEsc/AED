package es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface IUsuarioEntityRepository extends JpaRepository<UsuarioEntity, Integer>{

}
