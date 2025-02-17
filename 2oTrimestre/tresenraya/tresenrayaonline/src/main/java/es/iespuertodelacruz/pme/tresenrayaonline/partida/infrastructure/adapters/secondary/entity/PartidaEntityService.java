package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.secondary.entity;

import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.Partida;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.domain.port.secondary.IPartidaRepository;
import es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.PartidaMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;


@Service
public class PartidaEntityService implements IPartidaRepository {

    @Autowired
    IPartidaEntityRepository partidaEntityRepository;

    @Override
    @Transactional
    public Partida savePartida(Partida partida) {

        PartidaEntity entity = PartidaMapper.INSTANCE.partidaToEntity(partida);
        PartidaEntity savedEntity = partidaEntityRepository.save(entity);
        Partida partidaNotEntity = PartidaMapper.INSTANCE.entityToPartida(savedEntity);

        return partidaNotEntity;
    }

    @Override
    public Partida findById(int id) {

        PartidaEntity partidaEntity = partidaEntityRepository.findById(id).orElse(null);

        if(partidaEntity == null){
            throw new RuntimeException("La partida con el id indicado no existe");
        }

        Partida partidaNotEntity = PartidaMapper.INSTANCE.entityToPartida(partidaEntity);

        return partidaNotEntity;
    }
}
