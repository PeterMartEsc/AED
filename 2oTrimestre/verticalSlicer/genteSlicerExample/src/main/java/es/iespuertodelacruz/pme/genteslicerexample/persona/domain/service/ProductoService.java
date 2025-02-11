package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.Persona;
import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.primary.IPersonaService;
import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IPersonaRepository;

public class PersonaService implements IPersonaService{

	@Autowired IPersonaRepository personaRepository;
	
	@Override
	public List<Persona> getAll() {
		return personaRepository.all();
	}

	@Override
	public Persona crearPersona(String nombre, int edad, Integer id) {
		// TODO Auto-generated method stub
		Persona persona = new Persona(nombre, edad, id);
		Persona save = personaRepository.save(persona);
		
		return save;
	}

}
