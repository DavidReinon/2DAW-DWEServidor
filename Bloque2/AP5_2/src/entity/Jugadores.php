<?php

namespace AP52\Entity;

use AP52\Repository\JugadoresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToOne;
use DateTime;
use Jugador;

#[Entity(repositoryClass: JugadoresRepository::class)]
#[Table(name: 'jugadores')]
class Jugadores
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'nombre', type: 'string', length: 255)]
    private string $nombre;

    #[Column(name: 'apellidos', type: 'string', length: 255)]
    private string $apellidos;

    #[Column(name: 'fecha_nacimiento', type: 'date')]
    private DateTime $fechaNacimiento;

    #[OneToOne(targetEntity: DNI::class)]
    #[JoinColumn(name: "DNI_id", referencedColumnName: "id", nullable: false)]
    private DNI $DNI;

    // Relación bidireccional
    /*    #[OneToMany(targetEntity: Juegos::class, mappedBy: 'jugador')]
        private Collection $juegos;*/

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getFechaNacimiento(): DateTime
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(DateTime $fechaNacimiento): void
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getDNI(): DNI
    {
        return $this->DNI;
    }

    public function setDNI(DNI $DNI): void
    {
        $this->DNI = $DNI;
    }



}