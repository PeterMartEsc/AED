package es.iespuertodelacruz.pme.mipruebahoy.dto;

public class ApuestaDTO {

    public String nombre;
    public int apuesta;

    public String getApuesta(){
        return  "{" + '\n'+
                "   Nombre: " + nombre + '\n' +
                "   Numero apostado: " + apuesta + '\n' +
                "}";
    }

    public ApuestaDTO() {}
}
