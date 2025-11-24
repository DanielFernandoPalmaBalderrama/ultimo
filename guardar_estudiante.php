<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$email = $_POST['email'];

$sql = "INSERT INTO estudiantes (nombre, ci, email) VALUES ('$nombre','$ci','$email')";
if ($conexion->query($sql)) {
    header("Location: estudiantes.php");
} else {
    echo "Error: ".$conexion->error;
}
?>
