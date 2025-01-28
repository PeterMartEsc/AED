package es.iespuertodelacruz.pme.institutosec;

import es.iespuertodelacruz.pme.institutosec.entity.Alumno;
import es.iespuertodelacruz.pme.institutosec.service.AlumnoService;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.core.annotation.Order;
import org.springframework.test.context.ActiveProfiles;
import org.springframework.test.context.jdbc.Sql;

import java.util.ArrayList;

import static org.junit.jupiter.api.Assertions.assertNotNull;
import static org.junit.jupiter.api.Assertions.assertTrue;

@SpringBootTest
@ActiveProfiles("test")
@Sql(scripts = {"/instituto_sec.sql"})
class ApplicationTests {

	@Test
	void contextLoads() {
	}

	@Autowired
	AlumnoService alumnoRepository;
	@Test
	@Order(2)
	void testGetAll() {
		System.out.println("GetAll");
		Iterable<Alumno> findAll = alumnoRepository.findAll();
		ArrayList<Alumno> alumnos = new ArrayList<>();
		for (Alumno alumno : findAll) {
			alumnos.add(alumno);
		}
		assertNotNull(findAll);
		assertTrue(alumnos.size() == 3);
	}
}
