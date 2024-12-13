<?php

namespace AP52\Entity;

use AP52\Repository\JuegosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToOne;
use DateTime;

#[Entity(repositoryClass: JuegosRepository::class)]
#[Table(name: 'juegos')]
class Juegos
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'nombre', type: 'string', length: 255)]
    private string $nombre;

    // Valores permitidos para dificultad
    public const DIFICULTADES_VALIDAS = [1, 2, 3, 4, 5];
    #[Column(name: 'dificultad', type: 'integer')]
    private int $dificultad;

    // alternativa usando columnDefinition
    // problemas: sólo vale para MySQL
    // problemas: doctrine no comprueba en el set que está en el rango. O sea que no ganamos nada.
    /*   #[Column(
           name: 'dificultad',
           type: 'string',
           columnDefinition: "ENUM('1', '2', '3', '4', '5')"
       )]*/

    #[Column(name: 'record_actual', type: 'float')]
    private float $record_actual;

    #[Column(name: 'fecha_record_actual', type: 'date')]
    private datetime $fecha_record_actual;

    // relación unidireccional
    #[ManyToOne(targetEntity: 'Jugadores')]
    #[JoinColumn(name: 'jugador_id', referencedColumnName: 'id')]
    private Jugadores $jugador;

    //relación bidireccional

    /*#[ManyToOne(targetEntity: 'Jugadores'), inversedBy: 'juegos']
    #[JoinColumn(name: 'jugador_id', referencedColumnName: 'id')]
    private Jugadores $jugador;*/

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getRecordActual(): float {
        return $this->record_actual;
    }

    public function setRecordActual(float $record_actual): void {
        $this->record_actual = $record_actual;
    }

    public function getFechaRecordActual(): DateTime {
        return $this->fecha_record_actual;
    }

    public function setFechaRecordActual(DateTime $fecha_record_actual): void {
        $this->fecha_record_actual = $fecha_record_actual;
    }

    public function getJugador(): Jugadores {
        return $this->jugador;
    }

    public function setJugador(Jugadores $jugador): void {
        $this->jugador = $jugador;
    }


    public function getDificultad(): int
    {
        return $this->dificultad;
    }

    public function setDificultad(int $dificultad): void
    {
        if (!in_array($dificultad, self::DIFICULTADES_VALIDAS)) {
            throw new \InvalidArgumentException("La dificultad debe ser un valor entre 1 y 5. Dado: $dificultad");
        }
        $this->dificultad = $dificultad;
    }



}