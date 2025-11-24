<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="dashboard">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="estudiantes.php">📚 Estudiantes</a>
        <a href="materias.php">📖 Materias</a>
        <a href="notas.php">📝 Notas</a>
    </div>

    <div class="main-content">
        <h1>Bienvenido al Panel Administrativo</h1>
        <p>En este dashboard puedes gestionar estudiantes, materias y notas de manera profesional.</p>
        <p>Usa el menú lateral para navegar entre secciones.</p>
    </div>
</div>

</body>
</html>
