<?php

namespace AP52\controllers;

use AP52\Entity\Juegos;
use AP52\views\CrearJuegoView;

use AP52\Entity\DNI;
use AP52\Entity\Jugadores;
use Doctrine\ORM\EntityManager;

class JuegoController {
    private ?EntityManager $entityManager = null;

    public function setEntityManager(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function crearJuego() {
        new CrearJuegoView();
    }

    public function guardarJuego() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nombre'])) $nombre = $_POST['nombre'];
            if (isset($_POST['dificultad'])) $dificultad = $_POST['dificultad'];
            if (isset($_POST['record_actual'])) $record_actual = $_POST['record_actual'];
            if (isset($_POST['fecha_record_actual'])) $fecha_record_actual = $_POST['fecha_record_actual'];
            if (isset($_POST['jugadorID'])) $jugadorID = $_POST['jugadorID'];
        }

        $juego = new Juegos();
        $juego->setNombre($nombre);
        $juego->setDificultad($dificultad);
        $juego->setRecordActual($record_actual);
        $juego->setFechaRecordActual(new \DateTime($fecha_record_actual));
        $juego->setJugador($this->entityManager->getRepository(Jugadores::class)->find(trim($jugadorID)));

        //En el caso de que sea un array de jugadores
//        if ($jugadores) {
//            $jugadoresIds = explode(',', $jugadores);
//            foreach ($jugadoresIds as $jugadorId) {
//                $jugador = $this->entityManager->getRepository(Jugadores::class)->find(trim($jugadorId));
//                if ($jugador) {
//                    $juego->addJugador($jugador); //Metodo por implementar
//                }
//            }
//        }

        $this->entityManager->persist($juego);
        $this->entityManager->flush();

        echo "Juego insertado en la BD con id: " . $juego->getId() . "<br>";
    }
}