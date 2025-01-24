<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnoRepository::class)]
class Alumno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Alumno = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $edad = null;

    #[ORM\ManyToOne(inversedBy: 'alumnos')]
    private ?Modulo $modulo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlumno(): ?string
    {
        return $this->Alumno;
    }

    public function setAlumno(string $Alumno): static
    {
        $this->Alumno = $Alumno;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function getModulo(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModulo(?Modulo $modulo): static
    {
        $this->modulo = $modulo;

        return $this;
    }
}
