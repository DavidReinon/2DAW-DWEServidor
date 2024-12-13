<?php

namespace AP52\views;

use DateTime;
class VerListaJugadoresView {
    private iterable $listaJugadores;

    /**
     * @param iterable $listaJugadores
     */
    public function __construct(iterable $listaJugadores) {
        $this->listaJugadores = $listaJugadores;

        echo "<a href='/'>Volver a vista principal</a>";
        echo "<table border='2'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>DNI</th></tr>";
        foreach ($this->listaJugadores as $jugador) {
            echo "<tr>";
            echo "<td>" . $jugador->getId() . "</td>";
            echo "<td>" . $jugador->getNombre() . "</td>";
            echo "<td>" . $jugador->getApellidos() . "</td>";
            echo "<td>" . $jugador->getFechaNacimiento()->format('d-m-Y') . "</td>";
            echo "<td>" . $jugador->getDni()->getNumero() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}