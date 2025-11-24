<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #555; padding: 8px; text-align: center; }
        th { background: #333; color: #fff; }
        td { background: #222; color: #fff; }
        .btn { background: #1e90ff; color: #fff; padding: 5px 10px; border-radius: 4px; text-decoration: none; }
        .btn-red { background: #ff4d4d; }
        .btn:hover { opacity: 0.8; }
        .promedio { margin-top: 15px; font-size: 1.2em; color: #fff; }
    </style>
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

        <!-- FORMULARIO DE FILTRO -->
        <form method="GET" action="">
            <input type="text" name="nombre" placeholder="Buscar por nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
            <button type="submit">🔍 Buscar</button>
        </form>
        <br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CI</th>
                <th>Email</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>

            <?php
            $nombreFiltro = isset($_GET['nombre']) ? $_GET['nombre'] : '';
            if($nombreFiltro != ''){
                $sql = "SELECT * FROM estudiantes WHERE nombre LIKE '%$nombreFiltro%'";
            } else {
                $sql = "SELECT * FROM estudiantes";
            }

            $res = $conexion->query($sql);

            $promediosEstudiantes = []; // para promedio del filtro

            while ($row = $res->fetch_assoc()):
                $idEstudiante = $row['id'];

                // Promedio del estudiante
                $sqlNotas = "SELECT AVG(nota) as promedio FROM notas WHERE estudiante_id = $idEstudiante";
                $resNotas = $conexion->query($sqlNotas);
                $promedio = $resNotas->fetch_assoc()['promedio'];
                $promedioMostrar = $promedio !== null ? number_format($promedio, 2) : "N/A";

                if ($promedio !== null) $promediosEstudiantes[] = $promedio;
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['ci'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $promedioMostrar ?></td>
                <td>
                    <a class="btn" href="editar_estudiante.php?id=<?= $row['id'] ?>">✏ Editar</a>
                    <a class="btn btn-red" href="eliminar_estudiante.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar estudiante?')">🗑 Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php
        // Promedio del filtro
        if (!empty($promediosEstudiantes)) {
            $promFiltro = number_format(array_sum($promediosEstudiantes)/count($promediosEstudiantes), 2);
            echo "<div class='promedio'>📊 Promedio de los estudiantes filtrados: $promFiltro</div>";
        }

        // Promedio general del curso
        $sqlGeneral = "SELECT AVG(nota) as promedio_general FROM notas";
        $resGeneral = $conexion->query($sqlGeneral);
        $promedioGeneral = $resGeneral->fetch_assoc()['promedio_general'];
        $promedioGeneralMostrar = $promedioGeneral !== null ? number_format($promedioGeneral, 2) : "N/A";
        echo "<div class='promedio'>📊 Promedio general del curso: $promedioGeneralMostrar</div>";
        ?>

    </div>
</div>

</body>
</html>
