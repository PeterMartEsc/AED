package es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary;


import es.iespuertodelacruz.pme.genteslicerexample.producto.domain.Producto;
import es.iespuertodelacruz.pme.genteslicerexample.producto.infrastructure.adapters.secondary.document.ProductoDocument;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

import java.util.List;

@Mapper
public interface IProductoDocumentMapper {
    IProductoDocumentMapper INSTANCE = Mappers.getMapper(IProductoDocumentMapper.class);

    Producto entityToDomain(ProductoDocument productoDocument);

    ProductoDocument domaintoEntity(Producto producto);

    List<Producto> toDomainList(List<ProductoDocument> personaEntities);

    List<ProductoDocument> toEntityList(List<Producto> productos);

}