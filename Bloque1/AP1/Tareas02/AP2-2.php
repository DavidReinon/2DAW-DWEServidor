<?php
require "AP2-1.php";

function colorearTexto($texto, $color): void {
    $colores = [
        'negro' => '0;30',
        'rojo' => '0;31',
        'verde' => '0;32',
        'amarillo' => '0;33',
        'azul' => '0;34',
        'morado' => '0;35',
        'cian' => '0;36',
        'blanco' => '1;37',
    ];

    $codigoColor = $colores[$color] ?? '0;37'; // Blanco por defecto
    echo "\033[" . $codigoColor . "m" . $texto . "\033[0m";
}

echo "CARRERA DE COCHES F1\n";

echo "Elige el numero de jugadores: ";
$numeroJugadores = (int)trim(fgets(STDIN));

if ($numeroJugadores < 2 || $numeroJugadores > 6) {
    echo "Debes elegir entre 2 y 6 jugadores.\n";
    exit;
}
$coches = [];

for ($i = 1; $i <= $numeroJugadores; $i++) {
    //Introduce para cada jugador los atributos de su coche
    echo "Jugador $i\n";
    echo "Introduce la marca del coche del jugador $i: ";
    $marca = trim(fgets(STDIN));
    echo "\n";
    echo "Introduce el modelo del coche del jugador $i: ";
    $modelo = trim(fgets(STDIN));
    echo "\n";
    echo "Introduce el color del coche del jugador $i: ";
    $color = trim(fgets(STDIN));
    echo "\n";
    echo "Introduce el combustible del coche del jugador $i: ";
    $combustible = (int)trim(fgets(STDIN));
    echo "\n";

    $coche = new CocheF1($marca, $modelo, $color, $combustible);
    echo "Se ha generado una velocidad máxima de " . $coche->getVelocidadMaxima() . " km/h.\n";
    $coches[] = $coche;
}

//Comienza la carrera
$distanciaTotalCarrera = 100;
while (true) {
    foreach ($coches as $index => $unCoche) {
        $resultadoDado = tirarDado();
        echo "Jugador " . ($index + 1) . "tirando dado del 1 al 10\n";
        echo "Resultado: $resultadoDado.\n";

        //Comprobacion de que no se supera la velocidad maxima
        if ($unCoche->getVelocidad() + $resultadoDado * 10 > $unCoche->getVelocidadMaxima()) {
            echo "El coche ha alcanzado la velocidad maxima .\n";
            $unCoche->acelerar($unCoche->getVelocidadMaxima() - $unCoche->getVelocidad());
        } else {
            $unCoche->acelerar($resultadoDado * 10);
        }

        $unCoche->avanzar();
        colorearTexto("*****************\n", 'azul');
        colorearTexto("El coche del jugador " . ($index + 1) . " ha avanzado " .
            $unCoche->getDistanciaRecorrida() . " metros a una velocidad de " .
            $unCoche->getVelocidad() . " km/h.\n", 'azul');
        colorearTexto("*****************\n", 'azul');
        echo "\n";

        if ($unCoche->getDistanciaRecorrida() >= $distanciaTotalCarrera) {
            colorearTexto("*****************\n", 'verde');
            colorearTexto("El jugador " . ($index + 1) . " ha ganado la carrera.\n", 'verde');
            colorearTexto("*****************\n", 'verde');
            $unCoche->mostrarEstado();
            exit;
        }
    }
}

function tirarDado(): int {
    return rand(1, 10);
}