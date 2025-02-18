<?php

namespace App\Entity;

use App\Repository\CocheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CocheRepository::class)]
class Coche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Marca = null;

    #[ORM\Column(length: 255)]
    private ?string $Modelo = null;

    #[ORM\Column(nullable: true)]
    private ?float $Potencia = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VelocidadMaxima = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $FechaCompra = null;

    #[ORM\ManyToOne(inversedBy: 'Coches')]
    private ?Usuario $usuario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarca(): ?string
    {
        return $this->Marca;
    }

    public function setMarca(string $Marca): static
    {
        $this->Marca = $Marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->Modelo;
    }

    public function setModelo(string $Modelo): static
    {
        $this->Modelo = $Modelo;

        return $this;
    }

    public function getPotencia(): ?float
    {
        return $this->Potencia;
    }

    public function setPotencia(?float $Potencia): static
    {
        $this->Potencia = $Potencia;

        return $this;
    }

    public function getVelocidadMaxima(): ?string
    {
        return $this->VelocidadMaxima;
    }

    public function setVelocidadMaxima(?string $VelocidadMaxima): static
    {
        $this->VelocidadMaxima = $VelocidadMaxima;

        return $this;
    }

    public function getFechaCompra(): ?\DateTimeInterface
    {
        return $this->FechaCompra;
    }

    public function setFechaCompra(\DateTimeInterface $FechaCompra): static
    {
        $this->FechaCompra = $FechaCompra;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }
}
