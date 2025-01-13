package es.iespuertodelacruz.pme.mipruebahoy.domain;

import es.iespuertodelacruz.pme.mipruebahoy.utils.Globals;

public class Apuesta {

    private Integer secreto;
    private Integer min;
    private Integer max;

    private boolean activa;

    // Static para que solo haya una unica instancia
    private static Apuesta apuesta;

    private Apuesta(){
        activa = false;
        //secreto = null;
        min = Globals.MINIMOALEATORIO;
        max = Globals.MAXIMOALEATORIO;
    }

    // Comprobar estatus
    public boolean isActiva() {
        return activa;
    }
    public Integer getMin() {
        return min;
    }
    public Integer getMax() {
        return max;
    }

    // Para crear la instancia de la apuesta desde fuera
    // Syncronized para asegurarse que solo entra un hilo a la vez
    public static synchronized Apuesta getInstance(){
        if(apuesta == null){
            return new Apuesta();
        }
        return apuesta;
    }

    public synchronized boolean iniciarReiniciarPartida(){
        if(!activa){
            this.secreto = generarAleatorio(Globals.MINIMOALEATORIO, Globals.MAXIMOALEATORIO);
            this.activa = true;
            return true;
        }

        return false;
    }

    private int generarAleatorio(int minimo, int maximo){
        //return (int)(Math.random()*(Globals.MAXIMOALEATORIO - Globals.MINIMOALEATORIO +1) + Globals.MINIMOALEATORIO);
        return (int)(Math.random()*(maximo - minimo +1) + minimo);
    }

    public synchronized String apostar(int numeroApuesta){
        String respuesta = null;

        if(!activa){
            respuesta = "Partida no activa. No se puede apostar";
        } else if (numeroApuesta < min || numeroApuesta > max) {
            respuesta = "El numero no está entre el minimo y máximo";
        } else if (numeroApuesta == secreto){
            respuesta = "Bravo! Acertaste el secreto:" + secreto;
            this.activa = false;
        } else {
            if(numeroApuesta > secreto){
                respuesta = "-secreto- es menor que "+numeroApuesta;
            } else {
                respuesta = "-secreto- es mayor que " +numeroApuesta;
            }
        }

        return respuesta;
    }
}
