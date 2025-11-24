<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilos básicos para el dashboard */
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5; }
        .dashboard { display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: #333; color: #fff; padding: 20px; }
        .sidebar h2 { margin-top: 0; }
        .sidebar a { display: block; color: #fff; text-decoration: none; margin: 10px 0; padding: 8px; border-radius: 4px; }
        .sidebar a:hover { background: #444; }
        .main-content { flex: 1; padding: 30px; }
        .btn { display: inline-block; background: #28a745; color: #fff; text-decoration: none; padding: 8px 15px; border-radius: 4px; border: none; cursor: pointer; }
        .btn:hover { background: #218838; }
        input[type="text"], input[type="email"] { width: 100%; padding: 8px; margin: 5px 0 15px; border: 1px solid #ccc; border-radius: 4px; }
        button.btn { width: auto; }
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
        <h2>➕ Agregar Estudiante</h2>
        <form action="guardar_estudiante.php" method="POST" id="formEstudiante">
            Nombre:<br>
            <input type="text" name="nombre" id="nombre" 
                   pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" 
                   title="Solo letras y espacios" required><br>
            CI:<br>
            <input type="text" name="ci" id="ci" 
                   pattern="^\d{7}([A-Za-z0-9]*)?$" 
                   title="Debe comenzar con 7 números. Puede tener un complemento alfanumérico opcional" required><br>
            Email:<br>
            <input type="email" name="email" required><br>
            <button type="submit" class="btn">Guardar</button>
        </form>
        <br>
        <a class="btn" href="estudiantes.php">⬅ Volver</a>
    </div>
</div>

<script>
document.getElementById('formEstudiante').addEventListener('submit', function(e) {
    const nombre = document.getElementById('nombre').value;
    const ci = document.getElementById('ci').value;

    // Validar nombre
    if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/.test(nombre)) {
        alert('El nombre solo puede contener letras y espacios');
        e.preventDefault();
        return;
    }

    // Validar CI (7 números al inicio + opcional complemento alfanumérico)
    if (!/^\d{7}([A-Za-z0-9]*)?$/.test(ci)) {
        alert('El CI debe comenzar con 7 números. Puede tener un complemento alfanumérico opcional');
        e.preventDefault();
        return;
    }
});
</script>
</body>
</html>
