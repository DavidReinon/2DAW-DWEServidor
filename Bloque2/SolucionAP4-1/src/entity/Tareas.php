<?php

namespace AP41\Entity;

use AP41\Repository\TareasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use DateTime;

#[Entity(repositoryClass: TareasRepository::class)]
#[Table(name: 'tareas')]
class Tareas
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'titulo', type: 'string', length: 255)]
    private string $titulo;

    #[Column(name: 'descripcion', type: Types::TEXT, length: 65535)]
    private string $descripcion;

    #[Column(name: 'fecha_creacion', type: 'date')]
    private DateTime $fechaCreacion;

    #[Column(name: 'fecha_vencimiento', type: 'date')]
    private DateTime $fechaVencimiento;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return DateTime
     */
    public function getFechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    /**
     * @param DateTime $fechaCreacion
     */
    public function setFechaCreacion(DateTime $fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return DateTime
     */
    public function getFechaVencimiento(): DateTime
    {
        return $this->fechaVencimiento;
    }

    /**
     * @param DateTime $fechaVencimiento
     */
    public function setFechaVencimiento(DateTime $fechaVencimiento): void
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }


}