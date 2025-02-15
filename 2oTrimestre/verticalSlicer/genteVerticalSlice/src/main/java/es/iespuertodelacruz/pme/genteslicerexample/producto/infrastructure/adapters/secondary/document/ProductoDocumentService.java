package es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary.document;

import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;
import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.port.secondary.IProductoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ProductoDocumentService implements IProductoRepository {

    @Autowired IProductoDocumentRepository productoDocumentRepository;


    @Override
    public Producto save(Producto producto) {
        //mapper->entity/document
        ProductoDocument productoDocument = productoDocumentRepository.save(producto);
        //mapper->domain
        Producto productoMappeado =
        return null;
    }

    @Override
    public List<Producto> all() {
        return null;
    }
}
