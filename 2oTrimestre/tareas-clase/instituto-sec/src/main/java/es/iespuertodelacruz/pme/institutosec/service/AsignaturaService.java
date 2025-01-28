package es.iespuertodelacruz.pme.institutov2.service;

import es.iespuertodelacruz.pme.institutov2.entity.Alumno;
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

        if(object.getNombre() == null){
            throw new RuntimeException("La asignatura tiene que tener un nombre asociado");
        }

        if(object.getCurso() == null){
            throw new RuntimeException("La asignatura tiene que tener un curso");
        }

        return asignaturaRepository.save(object);
    }

    @Override
    public boolean update(Asignatura object) {

        if(object != null && object.getId() != 0) {

            Asignatura asignatura = asignaturaRepository.findById(object.getId()).orElse(null);
            if(asignatura == null){
                throw new RuntimeException("No existe la asignatura " +object);
            }

            if(object.getNombre() != null){
                asignatura.setNombre(object.getNombre());
            }

            if(object.getCurso() != null){
                asignatura.setCurso(object.getCurso());
            }

            asignaturaRepository.save(asignatura);
            return true;
        } else{
            return false;
        }
    }

    @Override
    public boolean deleteById(Integer id) {
        asignaturaRepository.deleteRelatedMatriculasById(id);

        int cantidad = asignaturaRepository.deleteByIdNotVoid(id);

        return cantidad > 0;
    }
}
