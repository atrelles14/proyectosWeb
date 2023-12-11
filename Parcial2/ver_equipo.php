<?php
session_start();
include_once 'conexionBD.php';

if (isset($_GET['id'])) {
    $id_equipo = $_GET['id'];

    $sql_equipo = "SELECT * FROM equipos WHERE id_equipo = ?";
    $stmt_equipo = mysqli_prepare($conexion_bd, $sql_equipo);
    mysqli_stmt_bind_param($stmt_equipo, "i", $id_equipo);
    mysqli_stmt_execute($stmt_equipo);
    $equipo_info = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_equipo));

    if ($equipo_info) {
        // Almacenar el nombre y el ID del equipo en la cookie
        setcookie('ultimo_equipo_visitado', "{$equipo_info['nombre']} (ID: $id_equipo)", time() + (86400 * 30), "/"); // 86400 = 1 día

        echo "<h1>{$equipo_info['nombre']}</h1>";
        echo "<p>Estado: {$equipo_info['estado']}</p>";
    } else {
        echo "Equipo no encontrado.";
    }
} else {
    header("Location: equipos.php");
    exit();
}
?>
