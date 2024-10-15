<?php
require_once '../modelos/Usuario.php';

function verListaUsuarios() {
    $usuarios = Usuario::getListaUsuarios();
    require '../vistas/listaUsuarios.php';
}

function verUsuario(int $id) {
    $usuario = Usuario::getUsuarioPorId($id);
    require '../vistas/verUsuario.php';
}