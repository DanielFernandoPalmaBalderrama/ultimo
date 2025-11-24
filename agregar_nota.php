<?php
include "conexion.php";

$estudiantes = $conexion->query("SELECT * FROM estudiantes ORDER BY nombre");
$materias = $conexion->query("SELECT * FROM materias ORDER BY nombre");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nota</title>
</head>
<body>

<h2>Registrar Nueva Nota</h2>

<form action="guardar_nota.php" method="POST">

    Estudiante:<br>
    <select name="estudiante_id" required>
        <option value="">Seleccionar...</option>
        <?php while ($e = $estudiantes->fetch_assoc()) : ?>
            <option value="<?= $e['id'] ?>"><?= $e['nombre'] ?></option>
        <?php endwhile; ?>
    </select>
    <br><br>

    Materia:<br>
    <select name="materia_id" required>
        <option value="">Seleccionar...</option>
        <?php while ($m = $materias->fetch_assoc()) : ?>
            <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?></option>
        <?php endwhile; ?>
    </select>
    <br><br>

    Nota (0 - 100):<br>
    <input type="number" name="nota" min="0" max="100" step="0.01" required>
    <br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="notas.php">⬅ Volver</a>

</body>
</html>
