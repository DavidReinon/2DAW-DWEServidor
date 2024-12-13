<?php

namespace AP52\controllers;

use AP52\Views\CrearJugadorView;

use AP52\Entity\DNI;
use AP52\Entity\Jugadores;
use Doctrine\ORM\EntityManager;

class JugadorController {
    private ?EntityManager $entityManager = null;

    public function setEntityManager(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function crearJugador() {
        new CrearJugadorView();
    }

    public function guardarJugador() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nombre'])) $nombre = $_POST['nombre'];
            if (isset($_POST['apellidos'])) $apellidos = $_POST['apellidos'];
            if (isset($_POST['fecha_nacimiento'])) $fecha_nacimiento = $_POST['fecha_nacimiento'];
            if (isset($_POST['dni_numero'])) $dni_numero = $_POST['dni_numero'];
            if (isset($_POST['dni_fecha_expedicion'])) $dni_fecha_expedicion = $_POST['dni_fecha_expedicion'];
            if (isset($_FILES['dni_documento'])) $dni_documento = $_FILES['dni_documento'];
        }

        $dni = new DNI();
        $dni->setNumero($dni_numero);
        $dni->setFechaExpedicion(new \DateTime($dni_fecha_expedicion));
        $dni->setPathFichero($dni_documento['full_path']);
        $this->entityManager->persist($dni);

        $jugador = new Jugadores();
        $jugador->setNombre($nombre);
        $jugador->setApellidos($apellidos);
        $jugador->setFechaNacimiento(new \DateTime($fecha_nacimiento));
        $jugador->setDNI($dni);
        $this->entityManager->persist($jugador);

        $this->entityManager->flush();

        echo "DNI insertado en BD " . $dni->getId() . "<br>";
        echo "Jugador insertado en BD " . $jugador->getId() . "<br>";
        echo "<a href='/'>Volver a vista principal</a>";
    }

    public function verJugadores() {

    }
}