<?php
include "conexion.php";

$estudiante_id = $_POST['estudiante_id'];
$materia_id = $_POST['materia_id'];
$nota = $_POST['nota'];

# VALIDACIÓN 1: Nota vacía
if ($nota === "" || $nota === null) {
    die("Error: La nota no puede estar vacía");
}

# VALIDACIÓN 2: Nota entre 0 y 100
if ($nota < 0 || $nota > 100) {
    die("Error: La nota debe estar entre 0 y 100");
}

# VALIDACIÓN 3: Estudiante existe
$check_est = $conexion->query("SELECT id FROM estudiantes WHERE id = $estudiante_id");
if ($check_est->num_rows == 0) {
    die("Error: El estudiante no existe.");
}

# VALIDACIÓN 4: Materia existe
$check_mat = $conexion->query("SELECT id FROM materias WHERE id = $materia_id");
if ($check_mat->num_rows == 0) {
    die("Error: La materia no existe.");
}

# SI TODO BIEN → INSERTAR
$sql = "INSERT INTO notas (estudiante_id, materia_id, nota) 
        VALUES ($estudiante_id, $materia_id, $nota)";

if ($conexion->query($sql)) {
    header("Location: notas.php");
} else {
    echo "Error guardando nota: " . $conexion->error;
}
?>
