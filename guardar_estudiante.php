<?php
include "conexion.php";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$email = $_POST['email'];

// Validar que el nombre solo tenga letras y espacios
if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/", $nombre)) {
    die("Error: El nombre solo puede contener letras y espacios");
}

// Preparar y ejecutar la inserción
$stmt = $conexion->prepare("INSERT INTO estudiantes (nombre, ci, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $ci, $email);

if ($stmt->execute()) {
    header("Location: estudiantes.php"); // Redirige a la lista de estudiantes
    exit();
} else {
    echo "Error al guardar el estudiante: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>
