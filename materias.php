<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
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
        <h2>📖 Lista de Materias</h2>

        <a class="btn" href="agregar_materia.php">➕ Agregar Materia</a>
        <br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>

            <?php
            $sql = "SELECT * FROM materias ORDER BY nombre ASC";
            $res = $conexion->query($sql);

            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td>
                    <a class="btn" href="editar_materia.php?id=<?= $row['id'] ?>">✏ Editar</a>
                    <a class="btn btn-red" href="eliminar_materia.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar materia?')">🗑 Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

    </div>
</div>

</body>
</html>
