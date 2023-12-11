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

$sql_jugadores = "SELECT equipos.id_equipo, equipos.nombre AS nombre_equipo, jugadores.id_jugador, jugadores.nombre AS nombre_jugador, jugadores.numero, jugadores.posicion
                FROM equipos
                LEFT JOIN jugadores ON equipos.id_equipo = jugadores.id_equipo
                ORDER BY equipos.id_equipo, jugadores.id_jugador";
$result_jugadores = mysqli_query($conexion_bd, $sql_jugadores);

$currentEquipo = '';

$equipos = array();

while ($fila = mysqli_fetch_assoc($result_jugadores)) {
    $id_equipo = $fila['id_equipo'];
    $nombre_equipo = $fila['nombre_equipo'];
    $nombre_jugador = $fila['nombre_jugador'];
    $numero = $fila['numero'];
    $posicion = $fila['posicion'];

    if ($currentEquipo != $nombre_equipo) {
        // Crear un nuevo array para el equipo
        $equipo = array(
            'nombre' => $nombre_equipo,
            'jugadores' => array()
        );

        $currentEquipo = $nombre_equipo;
    }

    // Agregar la información del jugador al array del equipo
    $jugador = array(
        'nombre' => $nombre_jugador,
        'numero' => $numero,
        'posicion' => $posicion
    );

    $equipo['jugadores'][] = $jugador;

    // Agregar el array del equipo al array general
    $equipos[$id_equipo] = $equipo;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American Score - Jugadores</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        
        .players-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .players-table th, .players-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .players-table th {
            background-color: #000;
            color: white;
        }

        .players-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="ribbon">
        ¡Última Hora! Los Houston Rockets son campeones de la liga!.
    </div>
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
    <main>
        <section class="main-intro">
            <h2>Lista de Jugadores por Equipos</h2>

            <?php
            foreach ($equipos as $equipo) {
                echo "<h3>{$equipo['nombre']}</h3>";

                if (!empty($equipo['jugadores'])) {
                    echo '<table class="players-table">';
                    echo '<thead><tr><th>Nombre del Jugador</th><th>Número</th><th>Posición</th></tr></thead>';
                    echo '<tbody>';

                    foreach ($equipo['jugadores'] as $jugador) {
                        echo "<tr><td>{$jugador['nombre']}</td><td>{$jugador['numero']}</td><td>{$jugador['posicion']}</td></tr>";
                    }

                    echo '</tbody></table>';
                } else {
                    echo '<p>No hay jugadores registrados para este equipo.</p>';
                }
            }
            ?>
        </section>
    </main>

    <footer>
    </footer>
</body>

</html>
