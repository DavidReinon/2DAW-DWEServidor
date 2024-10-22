<?php

namespace D\Aev1\Controllers;

use D\Aev1\core\DataBase;
use D\Aev1\models\Tareas;
use D\Aev1\views\DetalleTarea;

/**
 * Controlador para la ruta /detalle
 */
class DetalleController
{
        public function detail($id = null){
            if(is_null($id)){
                //Hemos recibido un nulo por id, por lo tanto le enviamos también nulo para que no se muestren datos.
                $data = null;
            }else{
                //Creamos una conexión a la BB.DD. e instanciamos el modelo Tarea para poder acceder a los datos.
                $tarea = new Tareas(new DataBase());
                //Ahora recibimos todos los datos que existan con la id solicitada, si no existen la vista lo procesa.
                $data = $tarea->findById($id);
            }
            $view = new DetalleTarea($data);
        }
}