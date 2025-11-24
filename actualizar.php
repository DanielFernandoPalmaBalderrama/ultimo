<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$email = $_POST['email'];

$sql = "UPDATE estudiantes 
        SET nombre='$nombre', ci='$ci', email='$email' 
        WHERE id=$id";

if ($conexion->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error actualizando: " . $conexion->error;
}
?>
