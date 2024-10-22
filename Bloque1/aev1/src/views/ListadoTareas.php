<?php

namespace D\Aev1\Views;


class ListadoTareas {
    /**
     * Lista todas las tareas de la tabla para
     * @param array|null $row
     */
    public function __construct(array $rows = null) {
        if (is_null($rows)) {
            //No hemos recibido nada por lo que debemos indicarlo.
            echo "No se han recibido datos para mostrar en la vista de Detalle";
            echo "<p><a href='/aev1/public/'>volver</p>";
        } else {
            //Verificamos que hemos recibido contenido para rellenar la tabla y si no hemos recibido nada lo indicaremos.
            if (count($rows) > 0) {
                echo "<table border='1'>";
                echo "<tr><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td><td>Eliminar</td></tr>";
                //Implementamos un formulario para la gestion de eliminar tareas con checkbox
                echo "<form  method='POST' action='/aev1/public/eliminar'>";
                echo "<button type='submit' style='background-color: red; border-radius: 8px;'>Eliminar Tareas Seleccionadas</button>";
                foreach ($rows as $row) {
                    //Backgound-color dependiendo de la propiedad que hemos asignado anteriormente
                    echo "<tr style='background-color: " . $row['color'] . ";'>
                    <td><a href='/aev1/public/detalle/" . $row["id"] . "'>" . $row["titulo"] . "</a></td>
                    <td>" . $row["descripcion"] . "</td>
                    <td>" . $row["fecha_creacion"] . "</td>
                    <td>" . $row["fecha_vencimiento"] . "</td>
                    <td><input type='checkbox' name='tareas_seleccionadas[]' value='" . $row["id"] . "'></td>
                    </tr > ";
                }
                echo "</form > ";
                echo "</table > ";
            } else {
                echo "0 results";
                echo " <p><a href = '/aev1/public/' > volver</p > ";
            }
        }
    }

}