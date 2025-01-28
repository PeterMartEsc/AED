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

    public Jugador getJugador1() {
        return jugador1;
    }

    public void setJugador1(Jugador jugador1) {
        this.jugador1 = jugador1;
    }

    public Jugador getJugador2() {
        return jugador2;
    }

    public void setJugador2(Jugador jugador2) {
        this.jugador2 = jugador2;
    }

    public Jugador getJugadorTurno() {
        return jugadorTurno;
    }

    public void setJugadorTurno(Jugador jugadorTurno) {
        this.jugadorTurno = jugadorTurno;
    }

    public char[][] getTablero() {
        return tablero;
    }

    public void setTablero(char[][] tablero) {
        this.tablero = tablero;
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

        char contenidoPosicion = tablero[x][j];

        if(contenidoPosicion == 'X' || contenidoPosicion == '0'){
            return null;
        }

        tablero[x][j] = jugadorJuega.getFigura();

        boolean hayGanador = comprobarGanador();

        return tablero;
    }

    private boolean comprobarGanador(){
        boolean hayLineas = comprobarLineas();
        boolean hayDiagonales = comprobarDiagonales();

        if(hayDiagonales || hayLineas){
            return true;
        }

        return false;
    }

    private boolean comprobarLineas(){
        int contadorX = 0;
        int contadorY = 0;

        for(int x = 0; x< 3; x++){
            for(int j = 0 ; j<3; j++){
                if(tablero[x][j] == jugadorTurno.getFigura()){
                    contadorX++;
                }
            }
        }


    }

    private boolean comprobarDiagonales(){
        return false;
    }

}
