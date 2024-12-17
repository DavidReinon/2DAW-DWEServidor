<?php

namespace AEV2\controllers;

use AEV2\Entity\Equipo;
use AEV2\Entity\Jugador;
use AEV2\Views\CrearEquipoView;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class EquipoController {

    private ?EntityManager $entityManager = null;
    private ?EntityRepository $equipoRepository = null;

    public function setEntityManager(EntityManager $entityManager): void {
        $this->entityManager = $entityManager;
        $this->equipoRepository = $this->entityManager->getRepository(Equipo::class);
    }

    /**
     * @return void
     */
    public function crearEquipo(): void {
        $jugadores = $this->entityManager->getRepository(Jugador::class)->findAll();
        new CrearEquipoView($jugadores);
    }

    /**
     * @return void
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function guardarEquipo(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'] ?? null;
            $division = $_POST['division'] ?? null;
            $mejorResultadoHistorico = $_POST['mejor_resultado_historico'] ?? null;
            $anioFormacion = $_POST['anio_formacion'] ?? null;
            $jugadoresSeleccionados = $_POST['jugadores'] ?? [];

            //Usarlo en caso de que tengamos una BD con muchos jugadores.
            //En este caso a ser una prueba lo dejo comentado.

//            if (count($jugadoresSeleccionados) < 6 || count($jugadoresSeleccionados) > 8) {
//                echo "Debes seleccionar entre 6 y 8 jugadores.<br>";
//                echo "<a href='/crearEquipo'>Volver a crear equipo</a>";
//                return;
//            }

            $equipo = new Equipo();
            $equipo->setNombre($nombre);
            $equipo->setDivision($division);
            $equipo->setMejorResultadoHistorico($mejorResultadoHistorico);
            $equipo->setAnioFormacion($anioFormacion);

            $jugadores = new ArrayCollection();
            foreach ($jugadoresSeleccionados as $jugadorId) {
                $jugador = $this->entityManager->getRepository(Jugador::class)->find($jugadorId);
                if ($jugador) {
                    //Añadimos a la lista
                    $jugadores->add($jugador);
                    //Seteamos tambien el equipo en la clase jugador (ya que puede no tener, o estar en otro)
                    $jugador->setEquipo($equipo);
                    $this->entityManager->persist($jugador);
                }
            }
            $equipo->setJugadores($jugadores);

            $this->entityManager->persist($equipo);
            $this->entityManager->flush();

            echo "Equipo insertado en BD con ID: " . $equipo->getId() . "<br>";
            echo "<a href='/'>Volver a vista principal</a>";
        }
    }
}