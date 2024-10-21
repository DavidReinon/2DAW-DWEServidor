<?php

namespace AP34\views;

class CrearTarea {

    public function __construct() {
        echo "<p><a href='/'>volver</a></p>";
        echo "<h1>Crear Tarea</h1>";

        echo "<form action='/AP3/AP3-4-MVC-Routing-con-Composer/public/nuevaTarea' method='post'>";
        echo "<label for='titulo'>Título:</label><br>";
        echo "<input type='text' id='titulo' name='titulo'><br>";

        echo "<label for='descripcion'>Descripción:</label><br>";
        echo "<input type='text' id='descripcion' name='descripcion'><br>";

        echo "<label for='fecha_creacion'>Fecha de Creación:</label><br>";
        echo "<input type='date' id='fecha_creacion' name='fecha_creacion'><br>";

        echo "<label for='fecha_vencimiento'>Fecha de Vencimiento:</label><br>";
        echo "<input type='date' id='fecha_vencimiento' name='fecha_vencimiento'><br>";

        echo "<input type='submit' value='Crear Tarea'>";
        echo "</form>";

    }

}