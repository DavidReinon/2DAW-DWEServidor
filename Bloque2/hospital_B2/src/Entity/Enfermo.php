<?php

namespace App\Entity;

use App\Repository\EnfermoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnfermoRepository::class)]
class Enfermo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $apellidos = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $enfermedad = null;

    #[ORM\OneToOne(mappedBy: 'enfermo', cascade: ['persist', 'remove'])]
    private ?Cirujano $cirujano = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
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

    public function getEnfermedad(): ?string
    {
        return $this->enfermedad;
    }

    public function setEnfermedad(?string $enfermedad): static
    {
        $this->enfermedad = $enfermedad;

        return $this;
    }

    public function getCirujano(): ?Cirujano
    {
        return $this->cirujano;
    }

    public function setCirujano(?Cirujano $cirujano): static
    {
        // unset the owning side of the relation if necessary
        if ($cirujano === null && $this->cirujano !== null) {
            $this->cirujano->setEnfermo(null);
        }

        // set the owning side of the relation if necessary
        if ($cirujano !== null && $cirujano->getEnfermo() !== $this) {
            $cirujano->setEnfermo($this);
        }

        $this->cirujano = $cirujano;

        return $this;
    }
}
