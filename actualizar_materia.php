<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];

if (trim($nombre) === "") {
    die("El nombre de la materia no puede estar vacío.");
}

$sql = "UPDATE materias SET nombre='$nombre' WHERE id=$id";

if ($conexion->query($sql)) {
    header("Location: materias.php");
} else {
    echo "Error actualizando: " . $conexion->error;
}
?>
