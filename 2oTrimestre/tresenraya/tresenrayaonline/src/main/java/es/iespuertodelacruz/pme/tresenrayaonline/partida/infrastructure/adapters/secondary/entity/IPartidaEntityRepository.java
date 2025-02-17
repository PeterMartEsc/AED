package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.secondary.entity;


import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

@Repository
public interface IPartidaEntityRepository extends JpaRepository<PartidaEntity, Integer> {

}
