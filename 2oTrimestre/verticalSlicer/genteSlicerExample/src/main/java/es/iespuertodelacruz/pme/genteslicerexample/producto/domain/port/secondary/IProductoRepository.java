package es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.secondary;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;

import java.util.List;

public interface IProductoRepository {
	
	Producto save(Producto persona);
	
	List<Producto> all();

}
