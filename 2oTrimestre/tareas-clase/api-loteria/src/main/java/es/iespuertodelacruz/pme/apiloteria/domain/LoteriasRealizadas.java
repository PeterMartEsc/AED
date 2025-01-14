package es.iespuertodelacruz.pme.apiloteria.domain;

import java.util.HashMap;

public class LoteriasRealizadas {

    private HashMap<Integer, Loteria> loteriasCerradas;

    private HashMap<Integer, Loteria> loteriasAbiertas;

    public static LoteriasRealizadas loteriasRealizadas;

    private LoteriasRealizadas() {
        loteriasCerradas = new HashMap<>();
        loteriasAbiertas = new HashMap<>();
    }

    public static synchronized LoteriasRealizadas getInstanceToCreate(){
        if(loteriasRealizadas == null){
            loteriasRealizadas = new LoteriasRealizadas();
        }
        return loteriasRealizadas;
    }

    /*
    public synchronized String aniadirLoteriaAbierta(Loteria loteria){
        if(loteriasAbiertas.containsKey(loteria)){

        }
    }*/

    /*
    public synchronized String actualizarLoterias(){

    }*/
}
