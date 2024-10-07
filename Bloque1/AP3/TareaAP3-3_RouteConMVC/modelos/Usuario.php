<?php
class Usuario {
    private static array $listaUsuarios = [
        ['id' => 1, 'nombre' => 'Carlos', 'email' => 'carlos@correo.com'],
        ['id' => 2, 'nombre' => 'María', 'email' => 'maria@correo.com'],
        ['id' => 3, 'nombre' => 'Juan', 'email' => 'juan@correo.com']
    ];

    private int $id;
    private string $nombre;
    private string $email;

    public function __construct(int $id, string $nombre, string $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public static function getListaUsuarios(): array {
        return self::$listaUsuarios;
    }

    public static function getUsuarioPorId(int $id): ?Usuario {
        foreach (self::$listaUsuarios as $usuario) {
            if ($usuario['id'] === $id) {
                return new self($usuario['id'], $usuario['nombre'], $usuario['email']);
            }
        }
        return null;
    }

    public function getUsuario(): string {
        return "ID: $this->id, Nombre: $this->nombre, Email: $this->email";
    }
}