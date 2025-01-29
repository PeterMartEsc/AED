package es.iespuertodelacruz.pme.institutosec.dto.usuario;

import java.util.Date;

public record UsuarioDTOSalidaV3(
        int id,
        String nombre,
        String correo,
        String rol,
        byte verificado,
        String tokenVerificacion,
        Date fechaCreacion

) {}
