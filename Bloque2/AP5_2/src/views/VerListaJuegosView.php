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
        echo "<tr><th>ID</th><th>Nombre</th><th>Fecha de Lanzamiento</th><th>Género</th></tr>";
        foreach ($this->listaJuegos as $juego) {
            echo "<tr>";
            echo "<td>" . $juego->getId() . "</td>";
            echo "<td>" . $juego->getNombre() . "</td>";
            echo "<td>" . $juego->getFechaLanzamiento()->format('d-m-Y') . "</td>";
            echo "<td>" . $juego->getGenero() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}