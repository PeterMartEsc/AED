package es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.primary;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;

import java.util.List;

public interface IProductoService {

	List<Producto> getAll();

	//No puede saber de fuera así que atributos
	Producto crearProducto(String nombre, int stock, float precio);

}
