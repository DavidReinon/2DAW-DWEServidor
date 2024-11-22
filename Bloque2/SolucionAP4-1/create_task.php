<?php

require_once "bootstrap.php";
//use \AP41\Entity\Tareas;

$newTaskTitulo = $argv[1];
$newTaskDesc = $argv[2];
$newTaskVenc = $argv[3];

$task = new \AP41\Entity\Tareas();
$task->setTitulo($newTaskTitulo);
$task->setDescripcion($newTaskDesc);
$task->setFechaCreacion(new \DateTime('now'));
$task->setFechaVencimiento(\DateTime::createFromFormat('d/m/Y',$newTaskVenc));

$entityManager->persist($task);
$entityManager->flush();

echo "Created tasd with ID " . $task->getId() . "\n";