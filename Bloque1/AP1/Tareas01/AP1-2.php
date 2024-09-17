<?php
foreach ($_GET as $key => $value) {
    if (filter_var($value, FILTER_VALIDATE_INT) !== false) {
        echo "Se ha recibido un numero";
        echo "<br>";
    } else if (is_null($value)) {
        echo "No se ha recibido ningun dato o es nulo";
        echo "<br>";
    } else {
        echo "Se ha recibido una cadena de caracteres";
        echo "<br>";
    }

}