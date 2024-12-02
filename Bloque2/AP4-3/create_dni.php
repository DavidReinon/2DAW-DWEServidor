<?php

require_once "bootstrap.php";

$newDniNumero = $argv[1];
$newDniFechaExp = $argv[2];
$newDniPathFichero = $argv[3];

$dni = new APPS_Doctrine\Entity\DNI();
$dni->setNumero($newDniNumero);
$dni->setFechaExpedicion(\DateTime::createFromFormat('d/m/Y', $newDniFechaExp));
$dni->setPathFichero($newDniPathFichero);

$entityManager->persist($dni);
$entityManager->flush();

echo "Created DNI with ID " . $dni->getId() . "\n";