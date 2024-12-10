<?php

namespace AP52\views;

class CrearJuegoView {
    public function __construct() {
        echo '<form action="/guardarJugador" method="post" enctype="multipart/form-data">';
        echo '<h2>Juego Nuevo</h2>';

        // Nombre
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" id="nombre" name="nombre" required><br><br>';

        // Apellidos
        echo '<label for="dificultad">Dificultad:</label>';
        echo '<input type="number" id="dificultad" name="dificultad" required><br><br>';

        // Fecha de nacimiento
        echo '<label for="record_actual">Record Actual:</label>';
        echo '<input type="date" id="record_actual" name="record_actual" required><br><br>';

        // DNI - Número
        echo '<label for="fecha_record_actual">Fecha Record Actual:</label>';
        echo '<input type="text" id="fecha_record_actual" name="fecha_record_actual" required><br><br>';

        // DNI - Fecha de Expedición
        echo '<label for="jugador">Jugador Dentro del Juego (ID):</label>';
        echo '<input type="number" id="jugador" name="jugador" placeholder="ID" 
        required><br><br>';


        // Botón de envío
        echo '<button type="submit">Guardar Jugador</button>';

        echo '</form>';
    }
}