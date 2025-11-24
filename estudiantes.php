<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
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
        <h2>📚 Lista de Estudiantes</h2>

        <a class="btn" href="agregar_estudiante.php">➕ Agregar Estudiante</a>
        <br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CI</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>

            <?php
            $sql = "SELECT * FROM estudiantes";
            $res = $conexion->query($sql);

            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['ci'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a class="btn" href="editar_estudiante.php?id=<?= $row['id'] ?>">✏ Editar</a>
                    <a class="btn btn-red" href="eliminar_estudiante.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar estudiante?')">🗑 Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>

        </table>

    </div>
</div>

</body>
</html>
