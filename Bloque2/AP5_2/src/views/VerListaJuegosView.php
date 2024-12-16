<?php

namespace AP52\views;

use DateTime;

class VerListaJuegosView {
    private iterable $listaJuegos;

    /**
     * @param iterable $listaJuegos
     */
    public function __construct(iterable $listaJuegos) {
        $this->listaJuegos = $listaJuegos;

        echo "<a href='/'>Volver a vista principal</a>";
        echo "<table border='2'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Dificultad</th><th>Record Actual</th>
        <th>Fecha Record Actual</th><th>Nombre Jugador</th></tr>";
        foreach ($this->listaJuegos as $juego) {
            echo "<tr>";
            echo "<td>" . $juego->getId() . "</td>";
            echo "<td>" . $juego->getNombre() . "</td>";
            echo "<td>" . $juego->getDificultad() . "</td>";
            echo "<td>" . $juego->getRecordActual() . "</td>";
            echo "<td>" . $juego->getFechaRecordActual()->format('d-m-Y') . "</td>";
            echo "<td>" . $juego->getJugador()->getNombre() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}