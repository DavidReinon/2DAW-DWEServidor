<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/vendor/autoload.php';

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
    'dbname'   => 'Juegos_AP4_3',
];

// Crear la conexión utilizando DriverManager
$connection = DriverManager::getConnection($dbParams, $config);

// Crear el EntityManager
$entityManager = new EntityManager($connection, $config);
