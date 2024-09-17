<?php
if (isset($_GET)) {
    $datosRuta = $_GET;
}

foreach ($datosRuta as $key => $value) {
    echo "Se ha recibido $value para la clave $key<br>";
}