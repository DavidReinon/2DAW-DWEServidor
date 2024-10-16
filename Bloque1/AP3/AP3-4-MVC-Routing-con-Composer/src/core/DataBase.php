<?php

namespace AP34\Core;

use AP34\Core\Interfaces\IDataBase;

class DataBase implements IDataBase
{
    private $dbConfig;
    private $conn;

    public function __construct()
    {
        //Recogemos los datos de configuración decodificando el archivo JSON de la configuración de la BBDD
        $this->dbConfig = json_decode(file_get_contents(__DIR__."/../../config/dbConfig.json"),true);
        $this->connect();
    }

    /**
     * Genera la conexión a la BBDD
     * @return void
     */
    private function connect(){
        //Se definen las varíables para crear la conexión a la BBDD
        $servername = $this->dbConfig["server"];
        $username = $this->dbConfig["user"];
        $password = $this->dbConfig["password"];
        $dbName = $this->dbConfig["dbname"];

        //Creamos la conexión
        $this->conn = new \mysqli($servername,$username,$password,$dbName);
    }

    /**
     * Función que ejecuta cualquier sentencia SQL que recibe y devuelve el resultado en un array asociativo
     * ESTA FUNCIÓN SE HA IMPLEMENTADO SÍ O SÍ PORQUE LO DEFINE EL INTERFAZ
     */
    public function executeSQL($sql){

        return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Se encarga de asegurarse que no se queda la conexión abierta consumiendo recursos
     */
    public function __destruct()
    {
        if($this->conn != null) $this->conn->close();
    }


}