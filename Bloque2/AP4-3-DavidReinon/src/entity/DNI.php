<?php

namespace APPS_Doctrine\Entity;

use AP41\Repository\DNIRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use DateTime;

#[Entity(repositoryClass: DNIRepository::class)]
#[Table(name: 'DNI')]
class DNI
{
    #[Id]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'numero', type: 'string', length: 9)]
    private string $numero;

    #[Column(name: 'fecha_expedicion', type: 'date')]
    private DateTime $fechaExpedicion;

    #[Column(name: 'path_documento', type: 'string', length: 255)]
    private string $pathFichero;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getFechaExpedicion(): DateTime
    {
        return $this->fechaExpedicion;
    }

    public function setFechaExpedicion(DateTime $fechaExpedicion): void
    {
        $this->fechaExpedicion = $fechaExpedicion;
    }

    public function getPathFichero(): string
    {
        return $this->pathFichero;
    }

    public function setPathFichero(string $pathFichero): void
    {
        $this->pathFichero = $pathFichero;
    }



}