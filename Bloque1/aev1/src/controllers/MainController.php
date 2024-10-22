<?php

namespace D\Aev1\Controllers;

use D\Aev1\Core\DataBase;
use D\Aev1\Models\Tareas;
use D\Aev1\Views\ListadoTareas;

class MainController
{
    public function main(){
        //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
        $tarea = new Tareas(new DataBase());
        //Ahora recibimos todos los datos que existan en la tabla.
        new ListadoTareas($tarea->findAll());
    }
}