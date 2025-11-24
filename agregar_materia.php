<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Materia</title>
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
        <h2>➕ Agregar Nueva Materia</h2>

        <form action="guardar_materia.php" method="POST">
            Nombre de la materia:<br>
            <input type="text" name="nombre" required>
            <br>
            <button type="submit" class="btn">Guardar</button>
        </form>

        <br>
        <a class="btn" href="materias.php">⬅ Volver</a>
    </div>
</div>

</body>
</html>
