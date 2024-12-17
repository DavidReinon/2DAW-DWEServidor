<?php

namespace AEV2\Views;

class CrearJugadorView {
    public function __construct() {
        echo '<form action="/guardarJugador" method="post" enctype="multipart/form-data">';
        echo '<h2>Jugador Nuevo</h2>';

        // Nombre
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" id="nombre" name="nombre" required><br><br>';

        // Apellidos
        echo '<label for="apellidos">Apellidos:</label>';
        echo '<input type="text" id="apellidos" name="apellidos" required><br><br>';

        // Fecha de nacimiento
        echo '<label for="fecha_nacimiento">Fecha de Nacimiento:</label>';
        echo '<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>';

        // DNI - Número
        echo '<label for="dni">Número DNI:</label>';
        echo '<input type="text" id="dni" name="dni" maxlength="9" required><br><br>';


        // Lado de Juego
        echo '<label for="lado_juego">Lado de Juego:</label>';
        echo '<input type="text" id="lado_juego" name="lado_juego" required><br><br>';

        // Sexo
        echo '<label for="sexo">Sexo:</label>';
        echo '<input type="text" id="sexo" name="sexo" required><br><br>';

        // Nivel
        echo '<label for="nivel">Nivel:</label>';
        echo '<input type="text" id="nivel" name="nivel" required><br><br>';

        // Equipo ID
        echo '<label for="equipo_id">Equipo ID:</label>';
        echo '<input type="number" id="equipo_id" name="equipo_id" ><br><br>';

        // Botón de envío
        echo '<button type="submit">Guardar Jugador</button>';

        echo '</form>';
    }
}