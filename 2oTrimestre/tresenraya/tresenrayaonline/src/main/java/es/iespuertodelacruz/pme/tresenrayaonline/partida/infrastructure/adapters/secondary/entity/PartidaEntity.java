package es.iespuertodelacruz.pme.tresenrayaonline.partida.infrastructure.adapters.secondary.entity;

import es.iespuertodelacruz.pme.tresenrayaonline.usuario.domain.Usuario;
import es.iespuertodelacruz.pme.tresenrayaonline.usuario.infrastructure.adapters.secondary.entity.UsuarioEntity;
import jakarta.persistence.*;

import java.io.Serializable;
import java.util.Objects;

@Entity
@Table(name="partidas")
public class PartidaEntity implements Serializable {

    @Id
    @GeneratedValue(strategy= GenerationType.IDENTITY)
    @Column(unique=true, nullable=false)
    private Integer id;

    @ManyToOne
    @JoinColumn(name = "jugador1")/*, referencedColumnName = "id",
            foreignKey = @ForeignKey(name = "fk_jugador1"))*/
    private UsuarioEntity jugador1;

    @ManyToOne
    @JoinColumn(name = "jugador2")/*, referencedColumnName = "id",
            foreignKey = @ForeignKey(name = "fk_jugador2"))*/
    private UsuarioEntity jugador2;

    @Lob
    @Column(columnDefinition = "TEXT")
    private String contenido;

    @ManyToOne
    @JoinColumn(name = "turno")/*, referencedColumnName = "id",
            foreignKey = @ForeignKey(name = "fk_turno"))*/
    private UsuarioEntity turno;

    @ManyToOne
    @JoinColumn(name = "ganador")/*, referencedColumnName = "id",
            foreignKey = @ForeignKey(name = "fk_ganador"))*/
    private UsuarioEntity ganador;


    public PartidaEntity() {
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public UsuarioEntity getJugador1() {
        return jugador1;
    }

    public void setJugador1(UsuarioEntity jugador1) {
        this.jugador1 = jugador1;
    }

    public UsuarioEntity getJugador2() {
        return jugador2;
    }

    public void setJugador2(UsuarioEntity jugador2) {
        this.jugador2 = jugador2;
    }

    public String getContenido() {
        return contenido;
    }

    public void setContenido(String contenido) {
        this.contenido = contenido;
    }

    public UsuarioEntity getTurno() {
        return turno;
    }

    public void setTurno(UsuarioEntity turno) {
        this.turno = turno;
    }

    public UsuarioEntity getGanador() {
        return ganador;
    }

    public void setGanador(UsuarioEntity ganador) {
        this.ganador = ganador;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        PartidaEntity that = (PartidaEntity) o;
        return Objects.equals(id, that.id);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }
}
