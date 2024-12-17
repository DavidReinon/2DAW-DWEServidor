<?php

namespace AEV2\Views;

class ListaJugadoresView {
    private iterable $listaJugadores;

    /**
     * @param iterable $listaJugadores
     */
    public function __construct(iterable $listaJugadores) {
        $this->listaJugadores = $listaJugadores;

        echo "<a href='/'>Volver a vista principal</a>";

        //Metodo post para poder eliminarlos
        echo "<form method='POST' action='/eliminarJugador'>";
        echo "<button type='submit' name='accion' value='eliminar'>Eliminar</button>";
        echo "<table border='2'>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>DNI</th>
                <th>Lado de Juego Favorito</th>
                <th>Sexo</th>
                <th>Nivel</th>
                <th>Equipo</th>
                <th>Acciones</th>
              </tr>";
        foreach ($this->listaJugadores as $jugador) {
            echo "<tr>";
            echo "<td>" . $jugador->getId() . "</td>";
            echo "<td>" . $jugador->getNombre() . "</td>";
            echo "<td>" . $jugador->getApellidos() . "</td>";
            echo "<td>" . $jugador->getFechaNacimiento()->format('d-m-Y') . "</td>";
            echo "<td>" . $jugador->getDni() . "</td>";
            echo "<td>" . $jugador->getLadoFavorito() . "</td>";
            echo "<td>" . $jugador->getSexo() . "</td>";
            echo "<td>" . $jugador->getNivel() . "</td>";
            echo "<td>" . ($jugador->getEquipo() ? $jugador->getEquipo()->getNombre() : 'Sin equipo') . "</td>";
            echo "<td>";
            echo "<input type='checkbox' name='jugadores_seleccionados[]' value='" . $jugador->getId() . "'>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    }
}