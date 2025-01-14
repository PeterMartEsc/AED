package es.iespuertodelacruz.pme.apiloteria.domain;

import es.iespuertodelacruz.pme.apiloteria.utils.Globals;

import java.util.HashMap;

public class Loteria {

    //private Integer id;
    private Integer secreto;
    private boolean activa;
    private Integer minimo;
    private Integer maximo;

    private HashMap<String, Integer> listaParticipantes;
    private HashMap<String, Integer> listaGanadores;

    private static Loteria loteria;

    private Loteria() {
        activa = false;
        secreto = null;
        minimo = Globals.MINIMOLOTERIA;
        maximo = Globals.MAXIMOLOTERIA;
        listaParticipantes = new HashMap<>();
        listaGanadores = new HashMap<>();
    }


    public boolean isActiva() {
        return activa;
    }


    //Permite la creación de una unica loteria. Y además solo puede ser accedido por un hilo a la vez
    public static synchronized Loteria getInstanceToCreate(){
        if(loteria == null){
            loteria = new Loteria();
        }
        return loteria;
    }

    public String status(){

        String status = "No hay ninguna lotería activa";

        if(activa){
            status = "{" + '\n'+
                    //"   id=" + loteria.id + '\n'+
                    "   secreto=" + secreto + '\n'+
                    "   activa=" + activa + '\n'+
                    "   minimo=" + minimo + '\n'+
                    "   maximo=" + maximo + '\n'+
                    "   listaParticipantes=" + listaParticipantes + '\n'+
                    "   listaGanadores=" + listaGanadores + '\n'+
                    '}';
        }

        return status;
    }

    public synchronized boolean iniciarLoteria(){
        if(!activa){
            secreto = generarAleatorio(Globals.MINIMOLOTERIA, Globals.MAXIMOLOTERIA);
            activa = true;
            return true;
        }
        return false;
    }

    private int generarAleatorio(int minimo, int maximo){
        //return (int)(Math.random()*(Globals.MAXIMOALEATORIO - Globals.MINIMOALEATORIO +1) + Globals.MINIMOALEATORIO);
        return (int)(Math.random()*(maximo - minimo +1) + minimo);
    }

    public synchronized String cerrarLoteria(){
        activa = false;
        comprobarGanador();
        return "La lotería se ha cerrado correctamente";
    }

    private synchronized void comprobarGanador(){

    }

    public synchronized String participarLoteria(String nombre, int numeroApuesta){
        String respuesta = null;

        if(!activa){
            respuesta = "Loteria acabada. Debe apostar por la loteria actual";
        } else if (numeroApuesta < minimo || numeroApuesta > maximo) {
            respuesta = "El numero no está entre el minimo y máximo abarcado por la loteria";
        } else {
            if(registrarParticipacion(nombre, numeroApuesta)){
                respuesta = "Ha apostado el " +numeroApuesta + " para la loteria. " + '\n'+
                            "Consulte los resultados pasado el tiempo para ver si ha ganado. " + '\n'+
                            "Buena suerte!";
            } else {
                respuesta = "Ya ha participado en este sorteo. Consulte el registro de la loteria para ver su apuesta";
            }

        }

        return respuesta;
    }

    private synchronized boolean registrarParticipacion(String nombre, int numeroApuesta){

        if(!listaParticipantes.containsKey(nombre)){
            listaParticipantes.put(nombre, numeroApuesta);
            return true;
        } else {
            return false;
        }

    }


}
