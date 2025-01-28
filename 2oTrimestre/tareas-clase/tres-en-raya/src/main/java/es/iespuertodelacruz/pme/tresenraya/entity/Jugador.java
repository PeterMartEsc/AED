package es.iespuertodelacruz.pme.tresenraya.entity;

public class Jugador {
    //private int id;
    private String name;
    private char figura;

    public Jugador(String name){
        this.name = name;
        this.figura = ' ';
    }

    /*public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }*/

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public char getFigura() {
        return figura;
    }

    public void setFigura(char figura) {
        this.figura = figura;
    }
}
