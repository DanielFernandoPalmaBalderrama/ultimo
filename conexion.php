<?php
$host = "127.0.0.1";
$user = "root";
$pass = "ikfcw18027"; 
$db   = "examen";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
