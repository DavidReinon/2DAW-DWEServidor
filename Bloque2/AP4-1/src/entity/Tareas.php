<?php

#[Entity(repositoryClass: TareasRepository::class)]
#[Table(name: 'todolistV2')]
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
}
