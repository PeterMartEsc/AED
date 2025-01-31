package es.iespuertodelacruz.pme.institutosec.services;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.entity.Matricula;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import es.iespuertodelacruz.pme.institutosec.service.AsignaturaService;
import es.iespuertodelacruz.pme.institutosec.service.MatriculaService;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.ActiveProfiles;
import org.springframework.test.context.jdbc.Sql;

import java.util.ArrayList;
import java.util.List;

@SpringBootTest
@ActiveProfiles("test")
@Sql(scripts = {"/instituto_sec.sql"})
public class MatriculaServiceTest {
    
    @Autowired
    MatriculaService service;

    @Autowired
    AlumnoService alumnoService;

    @Autowired
    AsignaturaService asignaturaService;

    @Test
    void getAllTest() {
        List<Matricula> list = service.findAll();
        Assertions.assertNotNull(list, "MESSAGE_ERROR");
        Assertions.assertEquals(1, list.size(), "MESSAGE_ERROR");
    }

    @Test
    void getOneTest() {
        Assertions.assertNotNull(service.findById(1), "MESSAGE_ERROR");
    }

    @Test
    void addTest() {
        Matricula itemToAdd = new Matricula();
        itemToAdd.setAnio(2021);

        Alumno alumno = alumnoService.findById("12345678Z");
        itemToAdd.setAlumno(alumno);

        List<Asignatura> asignaturas = new ArrayList<>();
        Asignatura asignatura = asignaturaService.findById(1);
        asignaturas.add(asignatura);
        itemToAdd.setAsignaturas(asignaturas);

        Matricula dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getAnio(), dbItem.getAnio(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getAlumno(), dbItem.getAlumno(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getAsignaturas(), dbItem.getAsignaturas(), "MESSAGE_ERROR");

    }

    @Test
    void updateTest() {
        Matricula itemToAdd = new Matricula();
        itemToAdd.setAnio(2021);

        Alumno alumno = alumnoService.findById("12345678Z");
        itemToAdd.setAlumno(alumno);

        List<Asignatura> asignaturas = new ArrayList<>();
        Asignatura asignatura = asignaturaService.findById(1);
        asignaturas.add(asignatura);
        itemToAdd.setAsignaturas(asignaturas);

        Matricula dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");

        Matricula itemToUpdate = new Matricula();
        itemToUpdate.setId(dbItem.getId());
        itemToUpdate.setAnio(2022);
        itemToUpdate.setAlumno(dbItem.getAlumno());
        itemToUpdate.setAsignaturas(new ArrayList<>());

        boolean dbUpdatedItem = service.update(itemToUpdate);

        Assertions.assertTrue(dbUpdatedItem, "MESSAGE_ERROR");
    }



    @Test
    void deleteTest() {
        Matricula itemToAdd = new Matricula();
        itemToAdd.setAnio(2021);

        Alumno alumno = alumnoService.findById("12345678Z");
        itemToAdd.setAlumno(alumno);

        List<Asignatura> asignaturas = new ArrayList<>();
        Asignatura asignatura = asignaturaService.findById(1);
        asignaturas.add(asignatura);
        itemToAdd.setAsignaturas(asignaturas);

        Matricula dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertTrue(service.deleteById(dbItem.getId()), "MESSAGE_ERROR");
    }
}
