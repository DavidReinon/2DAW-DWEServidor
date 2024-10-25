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
// or if you prefer XML
// $config = ORMSetup::createXMLMetadataConfiguration(
//
paths:
[__DIR__ . '/config/xml'];
//
//);
isDevMode:
true;
// configuring the database connection
$connection = DriverManager::getConnection([
//     'driver' => 'pdo_sqlite',
//     'path' => __DIR__ . '/db.sqlite',
    "driver" => "pdo_mysql",
    //"path" => __DIR__ . '/db.mysql',
    "host" => "172.18.0.2",
    "user" => "root",
    "password" => "root",
    "dbname" => "nuevaBD",
], $config);
// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
