package es.iespuertodelacruz.pme.tresenraya.entity;

import java.util.Random;

public class Partida {

    private Jugador jugador1;
    private Jugador jugador2;
    private Jugador jugadorTurno;

    char[][] tablero = {{' ', ' ', ' '},
                       {' ', ' ', ' '},
                       {' ', ' ', ' '}};

    public Partida(Jugador jugador1, Jugador jugador2){
        jugador1.setFigura('X');
        jugador2.setFigura('0');
        this.jugador1 = jugador1;
        this.jugador2 = jugador2;
        this.jugadorTurno = turnoJugador();
    }

    private Jugador turnoJugador(){
        Random random = new Random();
        int eleccion = random.nextInt(2)+1;

        if(eleccion == 1){
            return jugador1;
        } else {
            return jugador2;
        }
    }

    private char[][] realizarJugada(int x, int j, Jugador jugadorJuega){
        if(jugadorJuega != jugadorTurno){
           return null;
        }

        tablero[x][j] = jugadorJuega.getFigura();
        return tablero;
    }

}
