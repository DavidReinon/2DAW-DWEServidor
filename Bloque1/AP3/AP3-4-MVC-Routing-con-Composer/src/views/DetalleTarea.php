<?php

namespace AP34\Views;

/**
 * Clase que se encarga de devolvernos los datos del detalle de una tarea o muchas dependiendo de la cantidad de datos recibidos en el array.
 */
class DetalleTarea
{
    public function __construct(array $row=null)
    {
        //Ruta de antes: /4-MVC/MVC4-MVC-Routing-con-Composer/public/
        //Para volver a vista general
        if(is_null($row)){
            //No hemos recibido nada por lo que debemos indicarlo.
            echo "No se han recibido datos para mostrar en la vista del Listado";
            echo "<p><a href='/AP3/AP3-4-MVC-Routing-con-Composer/public/'>volver</p>";
        }else {
            //Verificamos que hemos recibido contenido para rellenar la tabla y si no hemos recibido nada lo indicaremos.
            if (count($row) > 0) {
                echo "<table border='1'>";
                echo "<tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td><td></td></tr>";
                echo "<tr><td>" . $row["id"] .
                    "<td>" . $row["titulo"] . "<td>" . $row["descripcion"] .
                    "<td>" . $row["fecha_creacion"] .
                    "<td>" . $row["fecha_vencimiento"] .
                    "<td><a href='/AP3/AP3-4-MVC-Routing-con-Composer/public/'>volver</td></tr>";
                echo "</table>";
            } else {
                echo "0 results";
                echo "<p><a href='/AP3/AP3-4-MVC-Routing-con-Composer/public/'>volver</p>";
            }
        }


    }

}