<?php
include "conexion.php";

$id = $_GET['id'];

# Opcional: verificar si la materia tiene notas asociadas
$check = $conexion->query("SELECT * FROM notas WHERE materia_id=$id");
if ($check->num_rows > 0) {
    die("No se puede eliminar, esta materia tiene notas registradas.");
}

$sql = "DELETE FROM materias WHERE id=$id";

if ($conexion->query($sql)) {
    header("Location: materias.php");
} else {
    echo "Error eliminando: " . $conexion->error;
}
?>
