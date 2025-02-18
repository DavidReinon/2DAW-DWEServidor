<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $Apellidos = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $FechaNacimiento = null;

    #[ORM\Column(length: 9)]
    private ?string $DNI = null;

    /**
     * @var Collection|ArrayCollection|null
     */
    #[ORM\OneToMany(targetEntity: Coche::class, mappedBy: 'usuario')]
    private ?Collection $Coches = null;

    public function __construct() {
        $this->Coches = new ArrayCollection();
    }

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

    public function getApellidos(): ?string {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): static {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface {
        return $this->FechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $FechaNacimiento): static {
        $this->FechaNacimiento = $FechaNacimiento;

        return $this;
    }

    public function getDNI(): ?string {
        return $this->DNI;
    }

    public function setDNI(string $DNI): static {
        $this->DNI = $DNI;

        return $this;
    }

    public function getCoches(): ?Collection {
        return $this->Coches;
    }

    public function addCoch(Coche $coch): static {
        if (!$this->Coches->contains($coch)) {
            $this->Coches->add($coch);
            $coch->setUsuario($this);
        }

        return $this;
    }

    public function removeCoch(Coche $coch): static {
        if ($this->Coches->removeElement($coch)) {
            // set the owning side to null (unless already changed)
            if ($coch->getUsuario() === $this) {
                $coch->setUsuario(null);
            }
        }

        return $this;
    }
}
