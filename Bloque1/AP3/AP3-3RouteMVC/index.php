<?php
$defaultController = "usuario";
$url = $_SERVER['REQUEST_URI'] ?? 'AP3/AP3-3RouteMVC/' . $defaultController . '/index'; // Capturar la URL

// Desglosar la URL en partes (controlador, acción, parámetro)
$url_parts = explode('/', $url);

// Asignar controlador, acción y parámetro por defecto
$controlador = !empty($url_parts[3]) ? ucfirst($url_parts[3]) . 'Controller' : ucfirst($defaultController) . 'Controller';
$accion = $url_parts[4] ?? 'index';
$parametro = $url_parts[5] ?? null;

// Incluir el archivo del controlador
$controladorPath = './controladores/' . $controlador . '.php';
echo "Controlador Path: $controladorPath<br>";
if (file_exists($controladorPath)) {
    require_once $controladorPath;
    echo "Controlador: $controlador, Acción: $accion, Parámetro: $parametro<br>";
    echo "<br>";
// Instanciar el controlador y llamar a la acción
    $controladorObj = new $controlador();
    if (method_exists($controladorObj, $accion)) {
        if ($parametro) {
            call_user_func_array([$controladorObj, $accion], [$parametro]);
        } else {
            call_user_func([$controladorObj, $accion]);
        }
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Controlador no encontrado.";
}