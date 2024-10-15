<?php
$defaultController = "Usuario";
$url = $SERVER['REQUEST_URI'] ?? 'AP3/AP3-3RouteMVC/' . $defaultController . '/index'; // Capturar la URL

// Desglosar la URL en partes (controlador, acción, parámetro)
$url_parts = explode('/', $url);

// Asignar controlador, acción y parámetro por defecto
$controlador = !empty($url_parts[2]) ? $url_parts[2] : $defaultController;
$accion = $url_parts[3] ?? 'index';
$parametro = $url_parts[4] ?? null;

// Incluir el archivo del controlador
$controladorPath = 'controladores/' . $controlador . 'Controller' . '.php';
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