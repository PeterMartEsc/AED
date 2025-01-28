package es.iespuertodelacruz.pme.institutosec.service;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import es.iespuertodelacruz.pme.institutosec.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

public class UsuarioService implements IServiceGeneric<Usuario, String> {

    @Autowired
    UsuarioRepository usuarioRepository;

    @Override
    public List<Usuario> findAll() {
        return usuarioRepository.findAll();
    }

    @Override
    public Usuario findById(String dni) {
        return usuarioRepository.findById(dni).orElse(null);
    }

    @Override
    public Usuario save(Usuario object) {
        return null;
    }

    @Override
    public boolean update(Usuario object) {
        return false;
    }

    @Override
    public boolean deleteById(String dni) {
        int cantidad = usuarioRepository.deleteUsuarioBydDni(dni);

        return cantidad > 0;
    }
}
