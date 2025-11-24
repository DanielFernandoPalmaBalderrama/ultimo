<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM estudiantes WHERE id=$id";

if ($conexion->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error eliminando: " . $conexion->error;
}
?>
