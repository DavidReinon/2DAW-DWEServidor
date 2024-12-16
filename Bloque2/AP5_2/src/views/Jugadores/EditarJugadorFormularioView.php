<?php

namespace AP52\views\Jugadores;

use AP52\Entity\Jugadores;

class EditarJugadorFormularioView {

    private Jugadores $jugador;

    public function __construct(Jugadores $jugador) {
        $this->jugador = $jugador;
        $this->renderForm();
    }

    private function renderForm(): void {
        echo '<form action="/actualizarJugador" method="post" enctype="multipart/form-data">';
        echo '<h2>Editar Jugador</h2>';

        // ID (no editable)
        echo '<label for="id">ID:</label>';
        echo '<input style="background-color: #ccc" type="text" id="id" name="id" 
        value="' . $this->jugador->getId() . '" readonly><br><br>';

        // Nombre
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" id="nombre" name="nombre" 
        value="' . $this->jugador->getNombre() . '" required><br><br>';

        // Apellidos
        echo '<label for="apellidos">Apellidos:</label>';
        echo '<input type="text" id="apellidos" name="apellidos" 
        value="' . $this->jugador->getApellidos() . '" required><br><br>';

        // Fecha de nacimiento
        echo '<label for="fecha_nacimiento">Fecha de Nacimiento:</label>';
        echo '<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
        value="' . $this->jugador->getFechaNacimiento()->format('Y-m-d') . '" required><br><br>';

        // DNI - Número
        echo '<label for="dni_numero">Número DNI:</label>';
        echo '<input type="text" id="dni_numero" name="dni_numero" 
        value="' . $this->jugador->getDni()->getNumero() . '" required><br><br>';

        // DNI - Fecha de Expedición
        echo '<label for="dni_fecha_expedicion">Fecha de Expedición:</label>';
        echo '<input type="date" id="dni_fecha_expedicion" name="dni_fecha_expedicion" 
        value="' . $this->jugador->getDni()->getFechaExpedicion()->format('Y-m-d') . '" required><br><br>';

        // DNI - Path al documento (opcional)
        echo '<label for="dni_documento">Documento (archivo):</label>';
        echo '<input type="file" id="dni_documento" name="dni_documento" accept=".pdf,.jpg,.png"><br><br>';

        // Botón de envío
        echo '<button type="submit">Actualizar Jugador</button>';

        echo '</form>';
    }
}