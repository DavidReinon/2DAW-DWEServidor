<?php
$host = '172.18.0.2'; //Ip servidor_db Docker
$username = 'root';
$password = 'root';
$database = 'AP1';

$mysqli = new mysqli($host, $username, $password, $database);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

echo "Conexión exitosa.";
echo "<br><br>";

$sql = "select * from usuarios";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "El usuario $row[nombre] pose la id: $row[id] y su estado es $row[estado]<br>";
}
echo "------------------<br>";


$numeroRandom = mt_rand(0, 1000) + (mt_rand(0, 1000));
$nombre = "Nombre$numeroRandom";

$sql = "insert into usuarios (nombre, estado) values ('$nombre', 0)";

if ($mysqli->query($sql) === true) {
    $ultimoId = $mysqli->insert_id;
    echo "Se ha realizado la inserción con la nueva id: $ultimoId<br>";
} else {
    die("No se ha podido realizar la inserción. " . $mysqli->error);
}

$sql = "UPDATE usuarios SET estado = 1 WHERE id = $ultimoId";

if ($mysqli->query($sql) === true) {
    echo "Actualización del estado con exito, del usuario con id: $ultimoId<br>";
} else {
    die("No se ha podido realizar la actualizacion del estado*. " . $mysqli->error);
}

$sql = "DELETE FROM usuarios WHERE id = $ultimoId";

if ($mysqli->query($sql) === true) {
    echo "Borrado con exito del usuario con id: $ultimoId<br>";
} else {
    die("No se ha podido realizar el delete del usuario. " . $mysqli->error);
}

$mysqli->close();