<?php
include 'session_functions.php'; // Incluir funciones de sesiones
include 'cookie_functions.php';  // Incluir funciones de cookies
include 'db_functions.php';      // Incluir funciones de base de datos

// Obtener el último equipo seleccionado
$last_team = get_last_team_cookie();

// Puedes agregar más lógica aquí según sea necesario

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <style>
        body {
            background-color: #D3D3D3;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .main-content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }
        .team-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .team-card {
            background-color: #F5F5F5;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Bienvenido a la Página Principal</h2>
    <div class="main-content">
        <h3>Equipos Disponibles</h3>
        <ul class="team-list">
            <?php
            $teams = get_all_teams(); 
            foreach ($teams as $team) {
                echo '<li class="team-card">';
                echo '<p><a href="team.php?team_id=' . $team['id'] . '">' . $team['nombre'] . '</a></p>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</body>
</html>
