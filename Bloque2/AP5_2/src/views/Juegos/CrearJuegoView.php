<?php

namespace AP52\views\Juegos;

class CrearJuegoView {
    public function __construct() {
        echo '<form action="/guardarJuego" method="post" enctype="multipart/form-data">';
        echo '<h2>Juego Nuevo</h2>';


        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" id="nombre" name="nombre" required><br><br>';


        echo '<label for="dificultad">Dificultad:</label>';
        echo '<input type="number" id="dificultad" name="dificultad" required><br><br>';


        echo '<label for="record_actual">Record Actual:</label>';
        echo '<input type="number" id="record_actual" name="record_actual" required><br><br>';


        echo '<label for="fecha_record_actual">Fecha Record Actual:</label>';
        echo '<input type="date" id="fecha_record_actual" name="fecha_record_actual" required><br><br>';


        echo '<label for="jugadorID">Jugador Dentro del Juego (ID):</label>';
        echo '<input type="number" id="jugadorID" name="jugadorID" placeholder="ID" required><br><br>';


        // Botón de envío
        echo '<button type="submit">Guardar Juego</button>';

        echo '</form>';
    }
}