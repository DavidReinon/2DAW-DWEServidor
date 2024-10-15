<?php
if (!empty($usuarios)) {
    foreach ($usuarios as $usuario) {
        echo "ID: {$usuario['id']}, Nombre: {$usuario['nombre']}, Email: {$usuario['email']}<br>";
    }
}