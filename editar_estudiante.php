<?php
include "conexion.php";
$id = $_GET['id'];
$sql = "SELECT * FROM estudiantes WHERE id=$id";
$res = $conexion->query($sql);
$row = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="dashboard">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="index.php">🏠 Dashboard</a>
        <a href="estudiantes.php">📚 Estudiantes</a>
        <a href="materias.php">📖 Materias</a>
        <a href="notas.php">📝 Notas</a>
    </div>

    <div class="main-content">
        <h2>✏ Editar Estudiante</h2>
        <form action="actualizar_estudiante.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            Nombre:<br>
            <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br>
            CI:<br>
            <input type="text" name="ci" value="<?= $row['ci'] ?>" required><br>
            Email:<br>
            <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
            <button type="submit" class="btn">Actualizar</button>
        </form>
        <br>
        <a class="btn" href="estudiantes.php">⬅ Volver</a>
    </div>
</div>
</body>
</html>
