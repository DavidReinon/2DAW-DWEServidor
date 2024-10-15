<?php
require_once __DIR__ . '/../modelos/Usuario.php';

function verListaUsuarios() {
    $usuarios = Usuario::getListaUsuarios();
    include __DIR__ . '/../vistas/listaUsuarios.php';
}

function verUsuario(int $id) {
    $usuario = Usuario::getUsuarioPorId($id);
    require '../vistas/verUsuario.php';
}