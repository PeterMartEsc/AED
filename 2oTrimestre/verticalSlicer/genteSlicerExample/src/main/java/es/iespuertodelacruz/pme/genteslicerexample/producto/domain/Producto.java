package es.iespuertodelacruz.pme.genteslicerexample.producto.domain;

public class Producto {

    //int id;
    String nombre;
    int stock;
    float precio;

    public Producto(String nombre, int stock, float precio) {
        this.nombre = nombre;
        this.stock = stock;
        this.precio = precio;
    }
}
