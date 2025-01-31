package es.iespuertodelacruz.pme.institutosec.service;

import es.iespuertodelacruz.pme.institutosec.entity.Usuario;
import es.iespuertodelacruz.pme.institutosec.repository.UsuarioRepository;
import es.iespuertodelacruz.pme.institutosec.service.interfaces.IServiceGeneric;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.UUID;

@Service
public class UsuarioService implements IServiceGeneric<Usuario, Integer> {

    @Autowired
    UsuarioRepository usuarioRepository;

    @Autowired
    private MailService mailService;

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

        if(usuario.getRol() == null){
            throw new RuntimeException("El usuario debe tener un rol asignado");
        }

        String tokenVerifCorreo = UUID.randomUUID().toString();
        usuario.setTokenVerificacion(tokenVerifCorreo);

        if(usuario.getVerificado() == 0){
            String senders[] = {"apps.akameterindustries@gmail.com", usuario.getCorreo()};
            mailService.send(senders, "Usuario creado: "+usuario.getNombre(), tokenVerifCorreo);
        }

        return usuarioRepository.save(usuario);
    }

    @Override
    @Transactional
    public boolean update(Usuario object) {

        if(object.getId() != 0){

            Usuario usuario = usuarioRepository.findById(object.getId()).orElse(null);
            if(usuario == null){
                throw new RuntimeException("No existe el usuario " +object);
            }

            if(object.getNombre() != null){
                usuario.setNombre(object.getNombre());
            }

            if(object.getCorreo() != null){
                usuario.setCorreo(object.getCorreo());
            }

            if(object.getPassword() != null){
                usuario.setPassword(object.getPassword());
            }

            if(object.getRol() != null){
                usuario.setRol(object.getRol());
            }

            if(object.getVerificado() != 0){
                usuario.setVerificado(object.getVerificado());

                if(usuario.getVerificado() == 0){
                    String senders[] = {"apps.akameterindustries@gmail.com", usuario.getCorreo()};
                    mailService.send(senders, "Usuario ACTUALIZADO: "+usuario.getNombre(), usuario.getTokenVerificacion());
                }
            }

            usuarioRepository.save(usuario);

            return true;

        } else {
            return false;
        }
    }

    @Override
    @Transactional
    public boolean deleteById(Integer id) {
        int cantidad = usuarioRepository.deleteByIdNotVoid(id);

        return cantidad > 0;
    }
}
