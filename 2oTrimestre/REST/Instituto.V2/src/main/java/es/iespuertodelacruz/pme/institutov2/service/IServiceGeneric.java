package es.iespuertodelacruz.pme.institutov2.service;

import java.util.List;

public interface IServiceGeneric<T, E> {
	List<T> findAll();
	
	T findById(E id);
	
	T save(T object);
	
	boolean update(T object);
	
	boolean deleteById(E id);
}

