<?php

namespace AEV2\Entity;

use AEV2\Repository\JugadorRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity(repositoryClass: JugadorRepository::class)]
#[Table(name: 'jugadores')]
class Jugador {
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(name: 'nombre', type: 'string', length: 255)]
    private string $nombre;

    #[Column(name: 'apellidos', type: 'string', length: 255)]
    private string $apellidos;

    #[Column(name: 'fecha_nacimiento', type: 'date')]
    private \DateTime $fechaNacimiento;

    #[Column(name: 'dni', type: 'string', length: 9, unique: true)]
    private string $dni;

    #[Column(name: 'lado_juego', type: 'string', length: 10)]
    private string $ladoFavorito; // Valores: 'derecha', 'revés'

    #[Column(name: 'sexo', type: 'string', length: 10)]
    private string $sexo; // Valores: 'hombre', 'mujer'

    #[Column(name: 'nivel', type: 'float', precision: 3, scale: 1)]
    private float $nivel; // Valores de 0.0 a 7.0 con saltos de 0.5

    #[ManyToOne(targetEntity: Equipo::class, inversedBy: 'jugadores')]
    #[JoinColumn(name: 'equipo_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?Equipo $equipo = null;

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function getFechaNacimiento(): \DateTime {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTime $fechaNacimiento): void {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getDni(): string {
        return $this->dni;
    }

    public function setDni(string $dni): void {
        $this->dni = $dni;
    }

    public function getLadoFavorito(): string {
        return $this->ladoFavorito;
    }

    public function setLadoFavorito(string $ladoFavorito): void {
        $this->ladoFavorito = $ladoFavorito;
    }

    public function getSexo(): string {
        return $this->sexo;
    }

    public function setSexo(string $sexo): void {
        $this->sexo = $sexo;
    }

    public function getNivel(): float {
        return $this->nivel;
    }

    public function setNivel(float $nivel): void {
        $this->nivel = $nivel;
    }

    public function getEquipo(): ?Equipo {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): void {
        $this->equipo = $equipo;
    }

}