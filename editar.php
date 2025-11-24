<?php
include("conexion.php");

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
</head>
<body>

<h2>Editar Estudiante</h2>

<form action="actualizar.php" method="POST">

    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    Nombre:<br>
    <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br><br>

    CI:<br>
    <input type="text" name="ci" value="<?= $row['ci'] ?>" required><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">⬅ Volver</a>

</body>
</html>
