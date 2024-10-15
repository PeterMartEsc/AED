/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package es.iespuertodelacruz.jc.proyectobase.dao;

import java.util.ArrayList;

/**
 *
 * @author carlos
 */
public interface ICrud<T, E> {


    public T save(T dao);


    public T findById(E id);

    
    public boolean update(T dao);

    
    public boolean delete(E id);

    
    public ArrayList<T> findAll();
}
