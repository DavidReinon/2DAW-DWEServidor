<?php

namespace AEV2\controllers;

use AEV2\Entity\Equipo;
use AEV2\entity\Jugador;
use AEV2\views\CrearJugadorView;
use AEV2\Views\ListaJugadoresView;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class JugadorController {

    private ?EntityManager $entityManager = null;
    private ?EntityRepository $jugadorRepository = null;

    public function setEntityManager(EntityManager $entityManager): void {
        $this->entityManager = $entityManager;
        $this->jugadorRepository = $this->entityManager->getRepository(Jugador::class);
    }

    /**
     * @return void
     */
    public function crearJugador() {
        new CrearJugadorView();
    }

    /**
     * @return void
     * @throws \DateMalformedStringException
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function guardarJugador() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'] ?? null;
            $apellidos = $_POST['apellidos'] ?? null;
            $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
            $dni_numero = $_POST['dni'] ?? null;
            $lado_juego = $_POST['lado_juego'] ?? null;
            $sexo = $_POST['sexo'] ?? null;
            $nivel = $_POST['nivel'] ?? null;
            $equipo_id = $_POST['equipo_id'] ?? null;

        }

        $jugador = new Jugador();

        $jugador->setNombre($nombre);
        $jugador->setApellidos($apellidos);
        $jugador->setFechaNacimiento(new \DateTime($fecha_nacimiento));
        $jugador->setDNI($dni_numero);
        $jugador->setLadoFavorito($lado_juego);
        $jugador->setSexo($sexo);
        $jugador->setNivel($nivel);

        if ($equipo_id) {
            $equipo = $this->entityManager->getRepository(Equipo::class)->find($equipo_id);
            $jugador->setEquipo($equipo);
        }

        $this->entityManager->persist($jugador);
        $this->entityManager->flush();

        echo "Jugador insertado en BD con ID: " . $jugador->getId() . "<br>";
        echo "<a href='/'>Volver a vista principal</a>";
    }

    /**
     * @return void
     */
    public function verListaJugadores(): void {
        $listaJugadores = $this->jugadorRepository->findAll();
        new ListaJugadoresView($listaJugadores);
    }

    /**
     * @return void
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function eliminarJugador(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jugadoresSeleccionados = $_POST['jugadores_seleccionados'] ?? [];

            if (empty($jugadoresSeleccionados)) {
                echo "No se han seleccionado jugadores.<br>";
                echo "<a href='/'>Volver a vista principal</a>";
                return;
            }

            foreach ($jugadoresSeleccionados as $id) {
                $jugador = $this->jugadorRepository->find($id);
                if ($jugador) {
                    $nombreJugador = $jugador->getNombre();
                    $this->entityManager->remove($jugador);
                    $this->entityManager->flush();

                    echo "El Jugador $nombreJugador ha sido eliminado de la BD <br>";
                } else {
                    echo "Jugador no encontrado.<br>";
                }
            }
            echo "<a href='/'>Volver a vista principal</a>";
        }
    }
}