<?php
// vistas/verUsuario.php
if ($usuario) {
    echo "ID: {$usuario->getId()}, Nombre: {$usuario->getNombre()}, Email: {$usuario->getEmail()}";
} else {
    echo "Usuario no encontrado.";
}