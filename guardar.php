<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$email = $_POST['email'];

$sql = "INSERT INTO estudiantes (nombre, ci, email) VALUES ('$nombre', '$ci', '$email')";

if ($conexion->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error guardando: " . $conexion->error;
}
?>
