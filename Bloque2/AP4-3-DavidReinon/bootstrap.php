<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";
// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);
// Parámetros de conexión a la base de datos
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => '172.18.0.2',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'juegos',
];

 // configuring the database connection
$connection = DriverManager::getConnection($dbParams, $config);
 // obtaining the entity manager
 $entityManager = new EntityManager($connection, $config);
