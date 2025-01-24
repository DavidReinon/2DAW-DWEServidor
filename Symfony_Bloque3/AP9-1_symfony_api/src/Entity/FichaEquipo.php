<?php

namespace App\Entity;

use App\Repository\FichaEquipoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaEquipoRepository::class)]
class FichaEquipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $clasificacionActual = null;

    #[ORM\Column]
    private ?int $puntos = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaCreacionEquipo = null;

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

    public function getClasificacionActual(): ?int
    {
        return $this->clasificacionActual;
    }

    public function setClasificacionActual(int $clasificacionActual): static
    {
        $this->clasificacionActual = $clasificacionActual;

        return $this;
    }

    public function getPuntos(): ?int
    {
        return $this->puntos;
    }

    public function setPuntos(int $puntos): static
    {
        $this->puntos = $puntos;

        return $this;
    }

    public function getFechaCreacionEquipo(): ?\DateTimeInterface
    {
        return $this->fechaCreacionEquipo;
    }

    public function setFechaCreacionEquipo(\DateTimeInterface $fechaCreacionEquipo): static
    {
        $this->fechaCreacionEquipo = $fechaCreacionEquipo;

        return $this;
    }
}
