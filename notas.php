<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
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
        <h2>📝 Notas Registradas</h2>

        <a class="btn" href="agregar_nota.php">➕ Registrar Nota</a>
        <br><br>

        <table>
            <tr>
                <th>Estudiante</th>
                <th>Materia</th>
                <th>Nota</th>
            </tr>

            <?php
            $sql = "
            SELECT n.id, e.nombre AS estudiante, m.nombre AS materia, n.nota
            FROM notas n
            JOIN estudiantes e ON n.estudiante_id = e.id
            JOIN materias m ON n.materia_id = m.id
            ORDER BY e.nombre ASC
            ";
            $res = $conexion->query($sql);

            while ($n = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $n['estudiante'] ?></td>
                <td><?= $n['materia'] ?></td>
                <td><strong><?= $n['nota'] ?></strong></td>
            </tr>
            <?php endwhile; ?>

        </table>

    </div>
</div>

</body>
</html>
