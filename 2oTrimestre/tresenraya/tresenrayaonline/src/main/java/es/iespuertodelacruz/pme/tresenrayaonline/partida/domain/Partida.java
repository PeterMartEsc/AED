package es.iespuertodelacruz.pme.tresenrayaonline.partida.domain;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;

import java.util.Objects;

public class Partida {
    Integer id;
    Usuario jugador1;
    Usuario jugador2;
    String contenido;
    Usuario turno;
    Usuario ganador;

    public Partida() {
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Partida partida = (Partida) o;
        return Objects.equals(id, partida.id);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Usuario getJugador1() {
        return jugador1;
    }

    public void setJugador1(Usuario jugador1) {
        this.jugador1 = jugador1;
    }

    public Usuario getJugador2() {
        return jugador2;
    }

    public void setJugador2(Usuario jugador2) {
        this.jugador2 = jugador2;
    }

    public String getContenido() {
        return contenido;
    }

    public void setContenido(String contenido) {
        this.contenido = contenido;
    }

    public Usuario getTurno() {
        return turno;
    }

    public void setTurno(Usuario turno) {
        this.turno = turno;
    }

    public Usuario getGanador() {
        return ganador;
    }

    public void setGanador(Usuario ganador) {
        this.ganador = ganador;
    }
}
