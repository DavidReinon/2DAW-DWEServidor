<?php

namespace App\Entity;

use App\Repository\CirujanoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CirujanoRepository::class)]
class Cirujano
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
    private ?string $especialidad = null;

    #[ORM\OneToOne(inversedBy: 'cirujano', cascade: ['persist', 'remove'])]
    private ?Enfermo $enfermo = null;

    /**
     * @var Collection<int, Quirofano>
     */
    #[ORM\ManyToMany(targetEntity: Quirofano::class, inversedBy: 'cirujanos')]
    private Collection $quirofanos;

    /**
     * @var Collection<int, Coche>
     */
    #[ORM\OneToMany(targetEntity: Coche::class, mappedBy: 'cirujano')]
    private Collection $Coches;

    public function __construct()
    {
        $this->quirofanos = new ArrayCollection();
        $this->Coches = new ArrayCollection();
    }

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

    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?string $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    public function getEnfermo(): ?Enfermo
    {
        return $this->enfermo;
    }

    public function setEnfermo(?Enfermo $enfermo): static
    {
        $this->enfermo = $enfermo;

        return $this;
    }

    /**
     * @return Collection<int, Quirofano>
     */
    public function getQuirofanos(): Collection
    {
        return $this->quirofanos;
    }

    public function addQuirofano(Quirofano $quirofano): static
    {
        if (!$this->quirofanos->contains($quirofano)) {
            $this->quirofanos->add($quirofano);
        }

        return $this;
    }

    public function removeQuirofano(Quirofano $quirofano): static
    {
        $this->quirofanos->removeElement($quirofano);

        return $this;
    }

    /**
     * @return Collection<int, Coche>
     */
    public function getCoches(): Collection
    {
        return $this->Coches;
    }

    public function addCoch(Coche $coch): static
    {
        if (!$this->Coches->contains($coch)) {
            $this->Coches->add($coch);
            $coch->setCirujano($this);
        }

        return $this;
    }

    public function removeCoch(Coche $coch): static
    {
        if ($this->Coches->removeElement($coch)) {
            // set the owning side to null (unless already changed)
            if ($coch->getCirujano() === $this) {
                $coch->setCirujano(null);
            }
        }

        return $this;
    }
}
