<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
</head>
<body>

<h2>Agregar Nuevo Estudiante</h2>

<form action="guardar.php" method="POST">
    Nombre:<br>
    <input type="text" name="nombre" required><br><br>

    CI:<br>
    <input type="text" name="ci" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php">⬅ Volver</a>

</body>
</html>
