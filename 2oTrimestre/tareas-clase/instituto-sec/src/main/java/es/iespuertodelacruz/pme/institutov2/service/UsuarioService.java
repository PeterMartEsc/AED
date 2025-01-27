package es.iespuertodelacruz.pme.institutov2.service;

import es.iespuertodelacruz.pme.institutov2.entity.Usuario;
import es.iespuertodelacruz.pme.institutov2.repository.UsuarioRepository;
import es.iespuertodelacruz.pme.institutov2.service.interfaces.IServiceGeneric;
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
        return usuarioRepository.findUsuarioByDni(dni);
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
