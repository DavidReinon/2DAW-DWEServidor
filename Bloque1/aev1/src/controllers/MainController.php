<?php

namespace D\Aev1\Controllers;

use D\Aev1\Core\DataBase;
use D\Aev1\Models\Tareas;
use D\Aev1\Views\ListadoTareas;

class MainController {
    public function main() {
        //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
        $tarea = new Tareas(new DataBase());
        //Ahora recibimos todos los datos que existan en la tabla.
        new ListadoTareas($tarea->findAll());
    }

    public function eliminar() {
        //Comprobamos que existen tareas seleccionadas
        if (isset($_POST['tareas_seleccionadas'])) {
            $tareasSeleccionadas = $_POST['tareas_seleccionadas'];

            $tarea = new Tareas(new DataBase());
            $resultado = $tarea->deleteVarios($tareasSeleccionadas);

            //Comprobamos que el resultado ha sido el esperado, si no controlamos los errores
            if ($resultado) echo "Tareas eliminadas correctamente. <br>";
            else echo "Error: No se han podido eliminar todas las tareas correctamente. <br>";

        } else {
            echo "No se han seleccionado tareas para eliminar. <br>";
        }
        echo " <p><a href = '/aev1/public/' > Volver a la lista</p> ";

    }
}