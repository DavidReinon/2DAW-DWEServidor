<?php

namespace AP52\controllers;

use AP52\Views\CrearJugadorView;
use AP52\Entity\DNI;
use AP52\Entity\Jugadores;
use AP52\views\EditarJugadorFormularioView;
use AP52\views\VerListaJugadoresView;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class JugadorController {
    private ?EntityManager $entityManager = null;
    private ?EntityRepository $jugadoresRepository = null;

    public function setEntityManager(EntityManager $entityManager): void {
        $this->entityManager = $entityManager;
        $this->jugadoresRepository = $this->entityManager->getRepository(Jugadores::class);
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

    public function verListaJugadores(): void {
        $listaJugadores = $this->jugadoresRepository->findAll();
        new VerListaJugadoresView($listaJugadores);
    }

    public function gestionarJugadores(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $accion = $_POST['accion'] ?? null;
            $jugadoresSeleccionados = $_POST['jugadores_seleccionados'] ?? [];

            if (empty($jugadoresSeleccionados)) {
                echo "No se han seleccionado jugadores.<br>";
                echo "<a href='/'>Volver a vista principal</a>";
                return;
            }

            if ($accion === 'editar') {
                if (count($jugadoresSeleccionados) !== 1) {
                    echo "Debe seleccionar solamente un jugador para editar.<br>";
                    echo "<a href='/'>Volver a vista principal</a>";
                    return;
                }
                $this->editarJugador($jugadoresSeleccionados[0]);

            } elseif ($accion === 'eliminar') {
                foreach ($jugadoresSeleccionados as $id) {
                    $this->eliminarJugador($id);
                }
            }
        }
    }

    public function editarJugador($id): void {
        $jugador = $this->jugadoresRepository->find($id);
        new EditarJugadorFormularioView($jugador);
    }

    public function actualizarJugador() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $apellidos = $_POST['apellidos'] ?? null;
            $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
            $dni_numero = $_POST['dni_numero'] ?? null;
            $dni_fecha_expedicion = $_POST['dni_fecha_expedicion'] ?? null;
            $dni_documento = $_FILES['dni_documento'] ?? null;

            $jugador = $this->jugadoresRepository->find($id);
            $dni = $jugador->getDni();

            $dni->setNumero($dni_numero);
            $dni->setFechaExpedicion(new DateTime($dni_fecha_expedicion));
            if ($dni_documento) {
                $dni->setPathFichero($dni_documento['full_path']);
            }
            $this->entityManager->persist($dni);

            $jugador->setNombre($nombre);
            $jugador->setApellidos($apellidos);
            $jugador->setFechaNacimiento(new DateTime($fecha_nacimiento));
            $jugador->setDNI($dni);
            $this->entityManager->persist($jugador);

            $this->entityManager->flush();

            echo "Jugador actualizado en BD " . $jugador->getId() . "<br>";
            echo "<a href='/'>Volver a vista principal</a>";
        }
    }

    public function eliminarJugador($id): void {
        $jugador = $this->jugadoresRepository->find($id);
        if ($jugador) {
            $nombreJugador = $jugador->getNombre();
            // Eliminar las referencias en la tabla juegos
            $query = $this->entityManager->createQuery('DELETE FROM AP52\Entity\Juegos j WHERE j.jugador = :jugador');
            $query->setParameter('jugador', $jugador);
            $query->execute();

            // Eliminar el jugador
            $this->entityManager->remove($jugador);
            $this->entityManager->flush();

            echo "El Jugador $nombreJugador ha sido eliminado de la BD <br>";
        } else {
            echo "Jugador no encontrado.<br>";
        }
        echo "<a href='/'>Volver a vista principal</a>";
    }
}