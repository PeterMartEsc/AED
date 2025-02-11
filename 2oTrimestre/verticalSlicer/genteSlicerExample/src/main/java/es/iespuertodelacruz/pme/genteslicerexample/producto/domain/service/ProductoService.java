package es.iespuertodelacruz.pme.genteslicerexample.producto.domain.service;

import java.util.List;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;
import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.primary.IProductoService;
import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.secondary.IProductoRepository;
import org.springframework.beans.factory.annotation.Autowired;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.primary.IProductoService;
import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.secondary.IProductoRepository;
import org.springframework.stereotype.Service;

@Service
public class ProductoService implements IProductoService {

	@Autowired
	IProductoRepository productoRepository;
	
	@Override
	public List<Producto> getAll() {
		return productoRepository.all();
	}

	@Override
	public Producto crearProducto(String nombre, int stock, float precio) {
		// TODO Auto-generated method stub
		Producto producto = new Producto(nombre, stock, precio);
		Producto save = productoRepository.save(producto);
		
		return save;
	}

}
