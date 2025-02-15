package es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.port.primary;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;

import java.util.List;


public interface IUsuarioService {

	String registrar(String nombre, String password, String correo);

	String logear(String nombre, String password);

	//No puede saber de fuera así que atributos


}
