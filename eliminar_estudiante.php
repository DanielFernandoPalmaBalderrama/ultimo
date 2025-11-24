<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // seguridad
    $sql = "DELETE FROM estudiantes WHERE id = $id";
    $conexion->query($sql);
}

header("Location: estudiantes.php");
exit();
?>
