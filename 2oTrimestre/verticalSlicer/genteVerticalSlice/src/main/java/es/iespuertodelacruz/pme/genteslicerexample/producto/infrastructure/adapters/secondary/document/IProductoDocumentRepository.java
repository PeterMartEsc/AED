package es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary.document;

import es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary.document.ProductoDocument;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface IProductoDocumentRepository extends MongoRepository<ProductoDocument, String> {

	//PersonaDocument findByDni(String dni);
    ProductoDocument findByStock(int stock);
    ProductoDocument findByNombre(String nombre);

}
