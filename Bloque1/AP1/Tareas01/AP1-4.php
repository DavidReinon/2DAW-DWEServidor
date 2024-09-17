<?php
//!!!APLICACION DE CONSOLA!!!!
//NO ejecutar desde navegador, si no desde terminal: php AP1-4.php
function calcularAreaTriangulo(float $base, float $altura): float
{
    return $base * $altura / 2;
}

function calcularAreaRectangulo(float $base, float $altura): float
{
    return $base * $altura;
}

function calcularAreaCirculo(float $radio): float
{
    return pi() * pow($radio, 2);
}

function pedirBaseAltura(): array
{
    echo "Dime la base: ";
    $base = (float)trim(fgets(STDIN));

    echo "Dime la altura: ";
    $altura = (float)trim(fgets(STDIN));

    return array($base, $altura);
}

function pedirRadio(): float
{
    echo "Dime el radio: ";
    $radio = (float)trim(fgets(STDIN));
    return $radio;
}

echo "0 => Triángulo\n";
echo "1 => Rectángulo\n";
echo "2 => Círculo\n";
echo "Elige qué figura quieres calcular mediante un número (0, 1, 2): ";

$eleccion = (int)trim(fgets(STDIN));  // Convertimos la entrada a entero

if ($eleccion === 0) {
    list($base, $altura) = pedirBaseAltura();
    echo "El área del Triángulo especificado es: " . calcularAreaTriangulo($base, $altura) . "\n";

} elseif ($eleccion === 1) {
    list($base, $altura) = pedirBaseAltura();
    echo "El área del Rectángulo especificado es: " . calcularAreaRectangulo($base, $altura) . "\n";

} elseif ($eleccion === 2) {
    $radio = pedirRadio();
    echo "El área del Círculo especificado es: " . calcularAreaCirculo($radio) . "\n";

} else {
    echo "Error: Número de figura incorrecto.\n";
}

