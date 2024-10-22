<?php

namespace AP34\Controllers;

use AP34\Core\DataBase;
use AP34\Models\Tareas;
use AP34\Views\ListadoTareas;

class MainController
{
    public function main(){
        //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
        $tarea = new Tareas(new DataBase());
        //Ahora recibimos todos los datos que existan en la tabla.
        new ListadoTareas($tarea->findAll());
    }
}