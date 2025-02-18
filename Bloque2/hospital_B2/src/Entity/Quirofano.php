<?php

namespace App\Entity;

use App\Repository\QuirofanoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuirofanoRepository::class)]
class Quirofano
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codigoQuirofano = null;

    #[ORM\Column(nullable: true)]
    private ?bool $estado = null;

    /**
     * @var Collection<int, Cirujano>
     */
    #[ORM\ManyToMany(targetEntity: Cirujano::class, mappedBy: 'quirofanos')]
    private Collection $cirujanos;

    public function __construct()
    {
        $this->cirujanos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigoQuirofano(): ?string
    {
        return $this->codigoQuirofano;
    }

    public function setCodigoQuirofano(?string $codigoQuirofano): static
    {
        $this->codigoQuirofano = $codigoQuirofano;

        return $this;
    }

    public function isEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(?bool $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection<int, Cirujano>
     */
    public function getCirujanos(): Collection
    {
        return $this->cirujanos;
    }

    public function addCirujano(Cirujano $cirujano): static
    {
        if (!$this->cirujanos->contains($cirujano)) {
            $this->cirujanos->add($cirujano);
            $cirujano->addQuirofano($this);
        }

        return $this;
    }

    public function removeCirujano(Cirujano $cirujano): static
    {
        if ($this->cirujanos->removeElement($cirujano)) {
            $cirujano->removeQuirofano($this);
        }

        return $this;
    }
}
