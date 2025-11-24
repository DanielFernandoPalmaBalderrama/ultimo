para poder hacer funcionar este proyecto se necesita cambiar estos datos 

<?php
$host = "127.0.0.1";
$user = "root";        (cambiar el usuario si usan otro)
$pass = "ikfcw18027";  (la contraseña que usen)
$db   = "examen";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
