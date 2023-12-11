<?php
session_start();
include_once 'conexionBD.php';

//Logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.html");
    exit();
}

if (isset($_SESSION['nombre'])) {
    echo "Bienvenido {$_SESSION['nombre']}.";
} else {
    echo "No has iniciado sesión.";
}
$nombre_usuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla General de Estadísticas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background: linear-gradient(135deg, #f69521, #d89f6a);
        color: #000000;
        text-align: center;
        padding: 1em 2em;
        height: 140px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        margin-bottom: 5px;
    }

    header nav {
        text-align: left;
        margin-left: 5px;
        flex: 1;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

        .back-button {
            align-self: flex-end;
            margin-top: 20px;
        }

        .back-button a {
            display: inline-block;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .ribbon {
        width: 100%;
        background-color: #000000;
        color: #ffffff;
        text-align: center;
        padding: 20px 0;
        position: fixed;
        top: 0;
        z-index: 1000;
        height: 18px;
    }



    </style>
</head>

<body>

<header>
    <h1>American Score</h1>
    <nav>
        <ul>
            <li><a href="equipos.php">Equipos</a></li>
            <li><a href="jugadores.php">Jugadores</a></li>
            <li><a href="estadisticas.php">Estadísticas</a></li>
            <li><a href="#Indumentaria">Indumentaria</a></li>
        </ul>
    </nav>
    <div class="user-info">
        <?php
        if (isset($_SESSION['nombre'])) {
            // Si el usuario está autenticado, muestra el botón de cerrar sesión
            echo "<img src='user.png' alt='avatar'>";
            echo "<p>{$nombre_usuario}</p>";
            echo "<form action='' method='post'>";
            echo "<button type='submit' name='logout'>Cerrar Sesión</button>";
            echo "</form>";
        } else {
            // Si el usuario no está autenticado, muestra el botón de iniciar sesión
            echo "<a href='login.html'><button>Iniciar Sesión</button></a>";
        }
        ?>
    </div>
</header>

    <!-- Ribbon de equipos.php -->
    <div class="ribbon">
        ¡Última Hora! Los Houston Rockets son campeones de la liga!.
    </div>
    <main>
        <div class="container mt-5">
            <h2>Tabla General de Estadísticas</h2>
            <table id="estadisticasTable" class="table">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Partidos Jugados</th>
                        <th>Victorias</th>
                        <th>Empates</th>
                        <th>Derrotas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'conexionBD.php';

                    if (!$conexion_bd) {
                        die("Error en la conexión: " . mysqli_connect_error());
                    }
                    $sql_estadisticas_general = "SELECT equipos.id_equipo, equipos.nombre, estadisticas_partidos.partidos_jugados, estadisticas_partidos.victorias, estadisticas_partidos.empates, estadisticas_partidos.derrotas
                    FROM equipos
                    INNER JOIN estadisticas_partidos ON equipos.id_equipo = estadisticas_partidos.id_equipo
                    ORDER BY victorias DESC, empates DESC, partidos_jugados DESC, derrotas DESC";

                    $result_estadisticas_general = mysqli_query($conexion_bd, $sql_estadisticas_general);

                    if (!$result_estadisticas_general) {
                        die("Error en la consulta: " . mysqli_error($conexion_bd));
                    }
                    
                    while ($fila = mysqli_fetch_assoc($result_estadisticas_general)) {
                        echo "<tr>";
                        echo "<td>{$fila['nombre']}</td>";
                        echo "<td>{$fila['partidos_jugados']}</td>";
                        echo "<td>{$fila['victorias']}</td>";
                        echo "<td>{$fila['empates']}</td>";
                        echo "<td>{$fila['derrotas']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#estadisticasTable').DataTable({
                "order": [[2, "desc"], [4, "asc"], [3, "desc"], [1, "desc"]]
            });
        });
    </script>

</body>

</html>
