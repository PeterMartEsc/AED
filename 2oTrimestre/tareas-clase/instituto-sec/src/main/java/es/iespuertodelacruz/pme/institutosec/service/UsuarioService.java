package es.iespuertodelacruz.pme.institutosec.service;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import es.iespuertodelacruz.pme.institutosec.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
@Service
public class UsuarioService implements IServiceGeneric<Usuario, Integer> {

    @Autowired
    UsuarioRepository usuarioRepository;

    @Override
    //@Transactional
    public List<Usuario> findAll() {
        return usuarioRepository.findAll();
    }

    @Override
    //@Transactional
    public Usuario findById(Integer id) {
        return usuarioRepository.findById(id).orElse(null);
    }

    @Override
    @Transactional
    public Usuario save(Usuario usuario) {

        if(usuario.getNombre() == null){
            throw new RuntimeException("El usuario debe tener dni");
            //return null;
        }

        if(usuario.getPassword() == null){
            throw new RuntimeException("El usuario debe tener contraseña");
        }

        if(usuario.getCorreo() == null){
            throw new RuntimeException("El usuario debe tener correo");
        }

        //usuario.setRol("user"); //usuariosetRol("admin");
        usuario.setTokenVerificacion("token_ejemplo");

        return usuarioRepository.save(usuario);
    }

    @Override
    @Transactional
    public boolean update(Usuario object) {
        return false;
    }

    @Override
    @Transactional
    public boolean deleteById(Integer id) {
        int cantidad = usuarioRepository.deleteByIdNotVoid(id);

        return cantidad > 0;
    }
}
