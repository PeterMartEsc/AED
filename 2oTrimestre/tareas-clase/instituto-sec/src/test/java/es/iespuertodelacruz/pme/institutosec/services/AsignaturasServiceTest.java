package es.iespuertodelacruz.pme.institutosec.services;

import es.iespuertodelacruz.pme.institutosec.entity.Asignatura;
import es.iespuertodelacruz.pme.institutosec.service.AsignaturaService;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.ActiveProfiles;
import org.springframework.test.context.jdbc.Sql;


import java.util.List;
@SpringBootTest
@ActiveProfiles("test")
@Sql(scripts = {"/instituto_sec.sql"})
public class AsignaturasServiceTest {

    @Autowired
    AsignaturaService service;

    @Test
    void getAllTest() {
        List<Asignatura> list = service.findAll();
        Assertions.assertNotNull(list, "MESSAGE_ERROR");
        Assertions.assertEquals(8, list.size(), "MESSAGE_ERROR");
    }

    @Test
    void getOneTest() {
        Assertions.assertNotNull(service.findById(1), "MESSAGE_ERROR");
    }

    @Test
    void addTest() {
        Asignatura itemToAdd = new Asignatura();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCurso("testcurso");

        Asignatura dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getNombre(), dbItem.getNombre(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getCurso(), dbItem.getCurso(), "MESSAGE_ERROR");
    }

    @Test
    void updateTest() {
        Asignatura itemToAdd = new Asignatura();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCurso("testcurso");

        Asignatura dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");

        Asignatura itemToUpdate = new Asignatura();
        itemToUpdate.setId(dbItem.getId());
        itemToUpdate.setNombre("testNombreUpdated");
        itemToAdd.setCurso("updatedCurso");

        boolean dbUpdatedItem = service.update(itemToUpdate);

        Assertions.assertTrue(dbUpdatedItem, "MESSAGE_ERROR");
    }



    @Test
    void deleteTest() {
        Asignatura itemToAdd = new Asignatura();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCurso("testcurso");

        Asignatura dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertTrue(service.deleteById(9), "MESSAGE_ERROR");
    }
}
