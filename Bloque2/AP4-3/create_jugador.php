<?php

require_once "bootstrap.php";

$newJugadorNombre = $argv[1];
$newJugadorApellidos = $argv[2];
$newJugadorFechaNac = $argv[3];
$newJugadorDNI = $argv[4];

$jugador = new \APPS_Doctrine\Entity\Jugadores();
$jugador->setNombre($newJugadorNombre);
$jugador->setApellidos($newJugadorApellidos);
$jugador->setFechaNacimiento(\DateTime::createFromFormat('d/m/Y', $newJugadorFechaNac));

$dni = $entityManager->find(\APPS_Doctrine\Entity\DNI::class, $newJugadorDNI);
$jugador->setDNI($dni);

$entityManager->persist($jugador);
$entityManager->flush();

echo "Created jugador with ID " . $jugador->getId() . "\n";
