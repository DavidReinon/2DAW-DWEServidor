<?php
// vistas/verUsuario.php
if ($usuario) {
    echo "ID: {$usuario->id}, Nombre: {$usuario->nombre}, Email: {$usuario->email}";
} else {
    echo "Usuario no encontrado.";
}