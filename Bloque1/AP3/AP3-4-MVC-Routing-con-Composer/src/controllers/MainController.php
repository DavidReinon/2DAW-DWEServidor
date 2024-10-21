<?php

namespace AP34\Controllers;

use AP34\Core\DataBase;
use AP34\Models\Tareas;
use AP34\views\CrearTarea;
use AP34\Views\ListadoTareas;

class MainController
{
    public function main(){
        //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
        $tarea = new Tareas(new DataBase());
        //Ahora recibimos todos los datos que existan en la tabla.
        new ListadoTareas($tarea->findAll());
    }

    public function nuevaTarea(){
        //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
        $tarea = new Tareas(new DataBase());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha_creacion = $_POST['fecha_creacion'];
            $fecha_vencimiento = $_POST['fecha_vencimiento'];

            $tarea->insert($titulo, $descripcion, $fecha_creacion, $fecha_vencimiento);

            echo "Tarea Insertada Con Exito!";
            echo "<p><a href='/AP3/AP3-4-MVC-Routing-con-Composer/public/'>Volver a la Lista</p>";
            exit();
        } else {
            new CrearTarea();
        }



    }

}