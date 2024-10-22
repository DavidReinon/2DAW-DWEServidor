<?php

namespace D\Aev1\Models;

use D\Aev1\Core\Interfaces\IDataBase;

class Tareas {
    //En vez de usar la clase DataBase usamos la interfaz, de forma que podemos cambiar de motor de BB.DD. y cumpliendo
    //con la interfaz siempre funcionará el modelo.
    private IDataBase $database;

    public function __construct(IDataBase $database) {

        $this->database = $database;

    }


    /**
     * Función que nos devuelve todos los registros de la tabla Tarea
     */
    public function findAll() {
        $sql = "SELECT * FROM tareas";
        $result = $this->database->executeSQL($sql);

        // Añadimos el campo 'color' en función de si la tarea está vencida o no,
        //para usarlo posteriormente en la vista.
        foreach ($result as &$row) {
            //Usamos un if ternario dependiendo del resultado de la funcion
            $row['color'] = $this->tareaVencida($row['fecha_vencimiento']) ? 'red' : 'white';
        }

        return $result;
    }


    /**
     * Función que nos devuelve el contenido de una tarea para su id
     */
    public function findById($id) {
        $sql = "SELECT * FROM tareas WHERE id=$id";
        $result = $this->database->executeSQL($sql);
        return array_shift($result);
    }

    /**
     * Funcion que elimina las tareas con los ids obtenidos por parametros
     * @param $arrayIds
     * @return bool
     */
    public function deleteVarios($arrayIds) {
        foreach ($arrayIds as $id) {
            $sql = "DELETE FROM tareas WHERE id=$id";
            $result = $this->database->executeSQL($sql);

            // Si la consulta falla, devolvemos false
            if (!$result) {
                return false;
            }
        }
        return true;
    }


    /**
     * Funcion que comprueba si la tarea a pasado el limite de fecha de vencimiento.
     * @param $fecha_vencimiento
     * @return bool
     */
    private function tareaVencida($fecha_vencimiento) {
        //Elegimos el formato correcto
        $fecha_actual = date('Y-m-d');
        return $fecha_actual > $fecha_vencimiento;
    }
}