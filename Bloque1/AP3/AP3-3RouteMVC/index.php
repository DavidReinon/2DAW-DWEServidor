<?php

$url = $_GET['url'] ?? 'usuario/index'; // Capturar la URL

// Desglosar la URL en partes (controlador, acción, parámetro)
$url_parts = explode('/', $url);

// Asignar controlador, acción y parámetro por defecto
$controlador = !empty($url_parts[0]) ? $url_parts[0] . 'Controller' : 'UsuarioController';
$accion = $url_parts[1] ?? 'index';
$parametro = $url_parts[2] ?? null;

// Incluir el archivo del controlador
$controladorPath = 'controladores/' . $controlador . '.php';
if (file_exists($controladorPath)) {
    require_once $controladorPath;

// Instanciar el controlador y llamar a la acción
    $controladorObj = new $controlador();
    if (method_exists($controladorObj, $accion)) {
        call_user_func_array([$controladorObj, $accion], [$parametro]);
    } else {
        echo "Acción no encontrada.";
    }

} else {
    echo "Controlador no encontrado.";
}



