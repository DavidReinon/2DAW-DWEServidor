<?php
const LISTA = [
    1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto",
];

$index = 1;
$acumulacion = 0;

foreach (LISTA as $key => $value) {
    $par = false;
    $impar = false;

    if ($index++ % 2 === 0) {
        $par = true;
    } else {
        $impar = true;
    }
    $acumulacion += $key;

    if ($par) echo "Estas en una posición par<br>";
    else echo "Estas en una posición impar<br>";

    echo "La suma total es " . $acumulacion . "<br>";

    if ($acumulacion > 5 && $acumulacion < 10) echo "El valor de la suma es mayor que 5<br>";
    else if ($acumulacion > 10 && $acumulacion < 20) echo "El valor de la suma es mayor que 10<br>";
    else if ($acumulacion > 20) echo "El valor de la suma es mayor que 20<br>";
    echo "=================<br>";
}