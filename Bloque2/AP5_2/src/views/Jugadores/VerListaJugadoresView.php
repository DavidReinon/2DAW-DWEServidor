<?php

namespace AP52\views\Jugadores;

class VerListaJugadoresView {
    private iterable $listaJugadores;

    /**
     * @param iterable $listaJugadores
     */
    public function __construct(iterable $listaJugadores) {
        $this->listaJugadores = $listaJugadores;

        echo "<a href='/'>Volver a vista principal</a>";
        echo "<form method='POST' action='/gestionarJugadores'>";
        echo "<button type='submit' name='accion' value='editar'>Editar</button>";
        echo "<button type='submit' name='accion' value='eliminar'>Eliminar</button>";
        echo "<table border='2'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>DNI</th><th>Acciones</th></tr>";
        foreach ($this->listaJugadores as $jugador) {
            echo "<tr>";
            echo "<td>" . $jugador->getId() . "</td>";
            echo "<td>" . $jugador->getNombre() . "</td>";
            echo "<td>" . $jugador->getApellidos() . "</td>";
            echo "<td>" . $jugador->getFechaNacimiento()->format('d-m-Y') . "</td>";
            echo "<td>" . $jugador->getDni()->getNumero() . "</td>";
            echo "<td>";
            echo "<input type='checkbox' name='jugadores_seleccionados[]' value='" . $jugador->getId() . "'>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    }
}