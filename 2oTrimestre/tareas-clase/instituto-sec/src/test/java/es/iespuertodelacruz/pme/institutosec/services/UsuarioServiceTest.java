package es.iespuertodelacruz.pme.institutosec.services;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.service.UsuarioService;
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
public class UsuarioServiceTest {
    
    @Autowired
    UsuarioService service;

    @Test
    void getAllTest() {
        List<Usuario> list = service.findAll();
        Assertions.assertNotNull(list, "MESSAGE_ERROR");
        Assertions.assertEquals(2, list.size(), "MESSAGE_ERROR");
    }

    @Test
    void getOneTest() {
        Assertions.assertNotNull(service.findById(1), "MESSAGE_ERROR");
    }

    @Test
    void addTest() {
        Usuario itemToAdd = new Usuario();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCorreo("apps.akameterindustries@gmail.com");
        itemToAdd.setPassword("1234");
        itemToAdd.setRol("ROLE_USER");
        itemToAdd.setVerificado(0);
        itemToAdd.setTokenVerificacion("tokenVerifExample");
        Date date = new Date();
        itemToAdd.setFechaCreacion(date);

        Usuario dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getId(), dbItem.getId(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getNombre(), dbItem.getNombre(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getCorreo(), dbItem.getCorreo(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getPassword(), dbItem.getPassword(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getVerificado(), dbItem.getVerificado(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getTokenVerificacion(), dbItem.getTokenVerificacion(), "MESSAGE_ERROR");
        Assertions.assertEquals(itemToAdd.getFechaCreacion(), dbItem.getFechaCreacion(), "MESSAGE_ERROR");
    }

    @Test
    void updateTest() {
        //service.deleteById(3);

        Usuario itemToAdd = new Usuario();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCorreo("apps.akameterindustries@gmail.com");
        itemToAdd.setPassword("1234");
        itemToAdd.setRol("ROLE_USER");
        itemToAdd.setVerificado(0);
        itemToAdd.setTokenVerificacion("tokenVerifExample");
        Date date = new Date();
        itemToAdd.setFechaCreacion(date);

        Usuario dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");

        Usuario itemToUpdate = new Usuario();
        itemToUpdate.setId(dbItem.getId());
        itemToUpdate.setNombre("updatedNombre");
        itemToUpdate.setCorreo("apps.akameterindustries@gmail.com");
        itemToUpdate.setPassword("12345");
        itemToUpdate.setRol("ROLE_ADMIN");
        itemToUpdate.setVerificado(1);
        //itemToUpdate.setTokenVerificacion("tokenVerifExample");
        Date date2 = new Date();
        itemToUpdate.setFechaCreacion(date2);
        System.out.println(service.findAll());
        boolean dbUpdatedItem = service.update(itemToUpdate);

        Assertions.assertTrue(dbUpdatedItem, "MESSAGE_ERROR");
    }



    @Test
    void deleteTest() {
        Usuario itemToAdd = new Usuario();
        itemToAdd.setNombre("testNombre");
        itemToAdd.setCorreo("apps.akameterindustries@gmail.com");
        itemToAdd.setPassword("1234");
        itemToAdd.setRol("ROLE_USER");
        itemToAdd.setVerificado(0);
        itemToAdd.setTokenVerificacion("tokenVerifExample");
        Date date = new Date();
        itemToAdd.setFechaCreacion(date);

        Usuario dbItem = service.save(itemToAdd);

        Assertions.assertNotNull(dbItem, "MESSAGE_ERROR");
        Assertions.assertTrue(service.deleteById(dbItem.getId()), "MESSAGE_ERROR");
    }
}
