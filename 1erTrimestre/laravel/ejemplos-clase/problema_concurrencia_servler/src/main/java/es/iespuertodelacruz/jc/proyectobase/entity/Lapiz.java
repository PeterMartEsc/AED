/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package es.iespuertodelacruz.jc.proyectobase.entity;

/**
 *
 * @author carlos
 */
public class Lapiz {

    @Override
    public String toString() {
        return "Lapiz{" + "idLapiz=" + idLapiz + ", marca=" + marca + ", numero=" + numero + '}';
    }
    
    Integer idLapiz;
    String marca;
    int numero;

    public Integer getIdLapiz() {
        return idLapiz;
    }

    public void setIdLapiz(Integer idLapiz) {
        this.idLapiz = idLapiz;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public Lapiz() {
    }

    public Lapiz(Integer idLapiz, String marca, int numero) {
        this.idLapiz = idLapiz;
        this.marca = marca;
        this.numero = numero;
    }
    
    
}
