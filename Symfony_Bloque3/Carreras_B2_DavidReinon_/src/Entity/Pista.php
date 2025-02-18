<?php

namespace App\Entity;

use App\Repository\PistaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PistaRepository::class)]
class Pista {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NivelDificultad = null;

    #[ORM\Column(nullable: true)]
    private ?int $Longitud = null;

    #[ORM\Column(nullable: true)]
    private ?int $NumeroCurvas = null;

    #[ORM\Column]
    private ?bool $Libre = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): ?string {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getNivelDificultad(): ?int {
        return $this->NivelDificultad;
    }

    public function setNivelDificultad(int $NivelDificultad): static {

        if ($NivelDificultad >= 0 && $NivelDificultad <= 5) {
            $this->NivelDificultad = $NivelDificultad;
        } else {
            $this->NivelDificultad = 0;
        }


        return $this;
    }

    public function getLongitud(): ?int {
        return $this->Longitud;
    }

    public function setLongitud(?int $Longitud): static {
        $this->Longitud = $Longitud;

        return $this;
    }

    public function getNumeroCurvas(): ?int {
        return $this->NumeroCurvas;
    }

    public function setNumeroCurvas(?int $NumeroCurvas): static {
        $this->NumeroCurvas = $NumeroCurvas;

        return $this;
    }

    public function isLibre(): ?bool {
        return $this->Libre;
    }

    public function setLibre(bool $Libre): static {
        $this->Libre = $Libre;

        return $this;
    }
}
