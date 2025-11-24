<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$email = $_POST['email'];

$sql = "UPDATE estudiantes SET nombre='$nombre', ci='$ci', email='$email' WHERE id=$id";
if ($conexion->query($sql)) {
    header("Location: estudiantes.php");
} else {
    echo "Error: ".$conexion->error;
}
?>
