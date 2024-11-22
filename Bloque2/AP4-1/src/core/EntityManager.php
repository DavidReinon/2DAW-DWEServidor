<?php

namespace core;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
class EntityManager
{
    private Doctrine\ORM\EntityManager $entityManager;

    // Getter para obtener el EntityManager
    public function getEntityManager(): Doctrine\ORM\EntityManager
    {
        return $this->entityManager;
    }

    // Constructor
    public function __construct()
    {
        // Prepara la ruta donde se encuentran las entidades
        $path = array(__DIR__ . '/../' . $_ENV['ENTITYFOLDER']);
        // Define si estás trabajando en desarrollo o no
        $isDevMode = boolval($_ENV['DEVELOP_MODE']);
        // Configura los parámetros de la conexión con la base de datos
        $dbParams = array(
            'driver'   => $_ENV['DBDRIVER'],
            'host'     => $_ENV['DBSERVER'],
            'user'     => $_ENV['DBUSER'],
            'password' => $_ENV['DBPASSWD'],
            'dbname'   => $_ENV['DBNAME']
        );
        // Configura la conexión para la configuración de Doctrine
        $config = ORMSetup::createAnnotationMetadataConfiguration($path, $isDevMode);
        // Crea una conexión para poder trabajar
        $connection = DriverManager::getConnection($dbParams, $config);
        // Instancia el EntityManager con la conexión establecida y la configuración cargada
        $this->entityManager = new Doctrine\ORM\EntityManager($connection, $config);
    }
}
