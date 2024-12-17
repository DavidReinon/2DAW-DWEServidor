<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/vendor/autoload.php';

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

//$dbParams= json_decode(file_get_contents(__DIR__."/config/dbConfig.json"),true);

$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => '172.18.0.1',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'Padel',
];

// Crear la conexión utilizando DriverManager
$connection = DriverManager::getConnection($dbParams, $config);

// Crear el EntityManager
$entityManager = new EntityManager($connection, $config);
