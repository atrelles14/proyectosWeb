<?php
// Conexión a la base de datos
function connect_to_db() {
    $host = "localhost";
    $usuario = "root";
    $contrasena = "admin";
    $nombre_db = "equipos";

    $conexion = new mysqli($host, $usuario, $contrasena, $nombre_db);

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    return $conexion;
}

function get_team_details($team_id) {
    $conexion = connect_to_db();
    $consulta = $conexion->prepare("SELECT nombre, estado, ano_fundacion FROM equipos WHERE id = ?");
    $consulta->bind_param("i", $team_id);
    $consulta->execute();
    $resultado = $consulta->get_result()->fetch_assoc();
    $consulta->close();
    $conexion->close();

    return $resultado;
}

function get_players($team_id) {
    $conexion = connect_to_db();
    $consulta = $conexion->prepare("SELECT nombre, numero, posicion FROM jugadores WHERE equipo_id = ?");
    $consulta->bind_param("i", $team_id);
    $consulta->execute();
    $resultado = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
    $consulta->close();
    $conexion->close();

    return $resultado;
}


function get_all_teams() {
    $conexion = connect_to_db();
    $consulta = $conexion->query("SELECT id, nombre FROM equipos");
    $resultado = array();

    while ($fila = $consulta->fetch_assoc()) {
        $resultado[] = $fila;
    }

    $conexion->close();

    return $resultado;
}
?>

