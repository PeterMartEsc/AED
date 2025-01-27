package es.iespuertodelacruz.pme.institutov2.service;

import es.iespuertodelacruz.pme.institutov2.entity.Asignatura;
import es.iespuertodelacruz.pme.institutov2.repository.AsignaturaRepository;
import es.iespuertodelacruz.pme.institutov2.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
@Service
public class AsignaturaService implements IServiceGeneric<Asignatura, Integer> {

    @Autowired
    AsignaturaRepository asignaturaRepository;


    @Override
    public List<Asignatura> findAll() {
        return asignaturaRepository.findAll();
    }

    @Override
    public Asignatura findById(Integer id) {
        return asignaturaRepository.findById(id).orElse(null);
    }

    @Override
    public Asignatura save(Asignatura object) {
        return null;
    }

    @Override
    public boolean update(Asignatura object) {
        return false;
    }

    @Override
    public boolean deleteById(Integer id) {
        asignaturaRepository.deleteRelatedMatriculasById(id);

        int cantidad = asignaturaRepository.deleteByIdNotVoid(id);

        return cantidad > 0;
    }
}
