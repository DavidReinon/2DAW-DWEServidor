<?php

namespace AEV2\Entity;

use AEV2\Repository\EquipoRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: EquipoRepository::class)]
#[Table(name: 'equipos')]
class Equipo {
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'nombre', type: 'string', length: 255)]
    private string $nombre;

    #[Column(name: 'division', type: 'string', length: 1)]
    private string $division; // Valores: 'A', 'B', 'C'

    #[Column(name: 'mejor_resultado_historico', type: 'string', length: 255, nullable: true)]
    private ?string $mejorResultadoHistorico = null;

    #[Column(name: 'anio_formacion', type: 'integer')]
    private int $anioFormacion;

    #[OneToMany(mappedBy: 'equipo', targetEntity: Jugador::class, cascade: ['persist', 'remove'])]
    private ?Collection $jugadores;

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getDivision(): string {
        return $this->division;
    }

    public function setDivision(string $division): void {
        $this->division = $division;
    }

    public function getMejorResultadoHistorico(): ?string {
        return $this->mejorResultadoHistorico;
    }

    public function setMejorResultadoHistorico(?string $mejorResultadoHistorico): void {
        $this->mejorResultadoHistorico = $mejorResultadoHistorico;
    }

    public function getAnioFormacion(): int {
        return $this->anioFormacion;
    }

    public function setAnioFormacion(int $anioFormacion): void {
        $this->anioFormacion = $anioFormacion;
    }

    public function getJugadores(): ?Collection {
        return $this->jugadores;
    }

    public function setJugadores(?Collection $jugadores): void {
        $this->jugadores = $jugadores;
    }
}