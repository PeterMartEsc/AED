package es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.entity;

import java.util.ArrayList;
import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.ProductoMapper;
import org.springframework.beans.factory.annotation.Autowired;

import es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.secondary.IProductoRepository;

public class ProductoEntityService implements IProductoRepository {

	@Autowired IPersonaEntityRepository personaEntityRepository;
	
	@Override
	public Persona save(Persona persona) {
		ProductoMapper mapper = new ProductoMapper();
		PersonaEntity savedEntity = personaEntityRepository.save(mapper.toPersistence(persona));
		return mapper.toDomain(savedEntity);
	}

	@Override
	public List<Persona> all() {
		ProductoMapper mapper = new ProductoMapper();
		List<PersonaEntity> peAll = personaEntityRepository.findAll();
		return new ArrayList<>();
	}

}
