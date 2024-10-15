<?php
require_once __DIR__ . '/../modelos/Usuario.php';

class UsuarioController {
    public function index() {
        $usuarios = Usuario::getListaUsuarios();
        require __DIR__ . '/../vistas/listaUsuarios.php';
    }

    public function ver(int $id) {
        $usuario = Usuario::getUsuarioPorId($id);
        require __DIR__ . '/../vistas/verUsuario.php';
    }
}