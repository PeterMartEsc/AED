package es.iespuertodelacruz.pme.genteslicerexample.persona.domain.port.primary;

import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;


public interface IPersonaService {

	List<Producto> getAll();

	//No puede saber de fuera así que atributos
	Producto crearProducto(String nombre, int edad, Integer id);

}
