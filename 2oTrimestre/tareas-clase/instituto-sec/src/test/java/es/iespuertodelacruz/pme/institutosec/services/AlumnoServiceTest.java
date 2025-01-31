package es.iespuertodelacruz.pme.institutosec.services;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.ActiveProfiles;
import org.springframework.test.context.jdbc.Sql;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

@SpringBootTest
@ActiveProfiles("test")
@Sql(scripts = {"/instituto_sec.sql"})
public class AlumnoServiceTest {

    @Autowired
    AlumnoService service;

    @Test
    void getAllTest() {
        List<Alumno> list = service.findAll();
        Assertions.assertNotNull(list, "MESSAGE_ERROR");
        Assertions.assertEquals(3, list.size(), "MESSAGE_ERROR");
    }

    @Test
    void getOneTest() {
        Assertions.assertNotNull(service.findById("12312312K"), "MESSAGE_ERROR");
    }

    @Test
    void addTest() {
        Alumno itemToAdd = new Alumno();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setApellidos("testApellidos");
        itemToAdd.setDni("12345678P");
        itemToAdd.setMatriculas(new ArrayList<>());
        itemToAdd.setFechanacimiento(new Date());
        itemToAdd.setImagen("imagen");

        Alumno dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getDni(), dbItem.getDni(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getNombre(), dbItem.getNombre(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getApellidos(), dbItem.getApellidos(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getFechanacimiento(), dbItem.getFechanacimiento(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getMatriculas(), dbItem.getMatriculas(), "MESSAGE_ERROR");
    }

    @Test
    void updateTest() {
        Alumno itemToAdd = new Alumno();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setApellidos("testApellidos");
        itemToAdd.setDni("12345678P");
        itemToAdd.setMatriculas(new ArrayList<>());
        itemToAdd.setFechanacimiento(new Date());
        itemToAdd.setImagen("imagen");

        Alumno dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");

        Alumno itemToUpdate = new Alumno();
        itemToUpdate.setDni(dbItem.getDni());
        itemToUpdate.setNombre("testNombre");
        itemToUpdate.setApellidos("testApellidos");
        itemToUpdate.setMatriculas(new ArrayList<>());
        itemToUpdate.setFechanacimiento(new Date());

        boolean dbUpdatedItem = service.update(itemToUpdate);

        Assertions.assertTrue(dbUpdatedItem, "MESSAGE_ERROR");
    }



    @Test
    void deleteTest() {
        Alumno itemToAdd = new Alumno();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setApellidos("testApellidos");
        itemToAdd.setDni("12345678P");
        itemToAdd.setMatriculas(new ArrayList<>());
        itemToAdd.setFechanacimiento(new Date());
        itemToAdd.setImagen("imagen");

        Alumno dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertTrue(service.deleteById("12345678P"), "MESSAGE_ERROR");
    }

}
