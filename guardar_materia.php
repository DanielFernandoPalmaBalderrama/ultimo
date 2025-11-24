<?php
include "conexion.php";

$nombre = $_POST['nombre'];

# Validar que no esté vacío
if (trim($nombre) === "") {
    die("El nombre de la materia no puede estar vacío.");
}

$sql = "INSERT INTO materias (nombre) VALUES ('$nombre')";

if ($conexion->query($sql)) {
    header("Location: materias.php");
} else {
    echo "Error al guardar: " . $conexion->error;
}
?>
