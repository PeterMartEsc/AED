package es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary;

import es.iespuertodelacruz.pme.genteslicerexample.persona.infrastructure.adapters.secondary.entity.PersonaEntity;
import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;
import es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary.document.ProductoDocument;

public class ProductoMapper {
	
	public ProductoDocument toPersistence(Producto p) {
		return new ProductoDocument();
	}
	public Producto toDomain(PersonaEntity pe) {
		return new Producto("ejemplo", 1, 1f);
	}

}
