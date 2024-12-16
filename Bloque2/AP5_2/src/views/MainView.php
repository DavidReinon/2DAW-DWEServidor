<?php

namespace AP52\views;

class MainView {
    public function __construct() {
        echo "<h1>Lista de acciones</h1>";
        echo '<ul>';
        echo '<li><a href="/crearJugador">Crear Jugador</a></li>';
        echo '<li><a href="/crearJuego">Crear Juego</a></li>';
        echo '<li><a href="/verListaJugadores">Ver lista Jugadores</a></li>';
        echo '<li><a href="/verListaJuegos">Ver lista Juegos</a></li>';
        echo '<li><a href="/verListaJugadores">Editar Jugador</a></li>';
        echo '<li><a href="/verListaJuegos">Editar Juego</a></li>';
        echo '<li><a href="/verListaJugadores">Eliminar Jugador</a></li>';
        echo '<li><a href="/verListaJuegos">Eliminar Juego</a></li>';
        echo '</ul>';
    }
}