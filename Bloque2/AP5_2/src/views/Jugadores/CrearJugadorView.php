<?php

namespace AP52\views\Jugadores;

class CrearJugadorView {
    public function __construct(){
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
        echo '<label for="dni_numero">Número DNI:</label>';
        echo '<input type="text" id="dni_numero" name="dni_numero" required><br><br>';

        // DNI - Fecha de Expedición
        echo '<label for="dni_fecha_expedicion">Fecha de Expedición:</label>';
        echo '<input type="date" id="dni_fecha_expedicion" name="dni_fecha_expedicion" required><br><br>';

        // DNI - Path al documento
        echo '<label for="dni_documento">Documento (archivo):</label>';
        echo '<input type="file" id="dni_documento" name="dni_documento" accept=".pdf,.jpg,.png" required><br><br>';

        // Botón de envío
        echo '<button type="submit">Guardar Jugador</button>';

        echo '</form>';
    }
}