<?php

namespace App\Entity;

use App\Repository\FichaJugadorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaJugadorRepository::class)]
class FichaJugador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $apellidos = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\Column(length: 255)]
    private ?string $equipoActual = null;

    #[ORM\Column(nullable: true)]
    private ?int $golesMarcados = null;

    #[ORM\Column(nullable: true)]
    private ?int $tarjetasRecibidas = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaNacimiento = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): static
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEquipoActual(): ?string
    {
        return $this->equipoActual;
    }

    public function setEquipoActual(string $equipoActual): static
    {
        $this->equipoActual = $equipoActual;

        return $this;
    }

    public function getGolesMarcados(): ?int
    {
        return $this->golesMarcados;
    }

    public function setGolesMarcados(?int $golesMarcados): static
    {
        $this->golesMarcados = $golesMarcados;

        return $this;
    }

    public function getTarjetasRecibidas(): ?int
    {
        return $this->tarjetasRecibidas;
    }

    public function setTarjetasRecibidas(?int $tarjetasRecibidas): static
    {
        $this->tarjetasRecibidas = $tarjetasRecibidas;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): static
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
}
