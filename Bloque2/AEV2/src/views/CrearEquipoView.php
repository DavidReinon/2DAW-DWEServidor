<?php

namespace AEV2\Views;

use AEV2\Entity\Jugador;

class CrearEquipoView {
    public function __construct(iterable $jugadoresASeleccionar) {
        echo '<form action="/guardarEquipo" method="post" enctype="multipart/form-data">';
        echo '<h2>Nuevo Equipo</h2>';

        // Nombre
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" id="nombre" name="nombre" required><br><br>';

        // División
        echo '<label for="division">División:</label>';
        echo '<input type="text" id="division" name="division" maxlength="1" required><br><br>';

        // Mejor Resultado Histórico
        echo '<label for="mejor_resultado_historico">Mejor Resultado Histórico:</label>';
        echo '<input type="text" id="mejor_resultado_historico" name="mejor_resultado_historico"><br><br>';

        // Año de Formación
        echo '<label for="anio_formacion">Año de Formación:</label>';
        echo '<input type="number" id="anio_formacion" name="anio_formacion" required><br><br>';

        //Recorro los jugadores actuales y cero una tabla en la que se los puede seleccionar para el equipo que se esta creando.
        echo '<h3>Seleccionar Jugadores</h3>';
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Nombre</th><th>Seleccionar</th></tr>';

        foreach ($jugadoresASeleccionar as $jugador) {
            echo '<tr>';
            echo '<td>' . $jugador->getId() . '</td>';
            echo '<td>' . $jugador->getNombre() . '</td>';
            echo '<td><input type="checkbox" name="jugadores[]" value="' . $jugador->getId() . '"></td>';
            echo '</tr>';
        }

        echo '</table><br>';
        // Botón de envío
        echo '<button type="submit">Guardar Equipo</button>';

        echo '</form>';
    }
}