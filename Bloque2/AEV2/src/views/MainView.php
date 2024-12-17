<?php

namespace AEV2\Views;

class MainView {
    public function __construct(array $rows = null) {
        echo "<h1>Gestion Club de Padel</h1><br>";
        echo "hola, bienvenido <br>";
        echo "Lista de acciones disponibles: <br>";
        echo '<ul>';
        echo '<li><a href="/crearJugador">Dar de Alta Jugador</a></li>';
        echo '<li><a href="/crearEquipo">Crear Equipo</a></li>';
        echo '<li><a href="/verListaJugadores">Ver lista Jugadores</a></li>';
        echo "</ul>";
    }
}