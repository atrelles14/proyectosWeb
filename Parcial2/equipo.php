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

$mensaje_exito = '';
$mensaje_error = '';


// Verificar si el usuario actual es un administrador
$nombre_usuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

if (esAdmin($conexion_bd, $nombre_usuario)) {
    // Si es un administrador, mostrar el formulario de añadir jugador
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_jugador'])) {
        // Procesar la información del formulario
        $nombre_jugador = $_POST['nombre_jugador'];
        $numero_jugador = $_POST['numero_jugador'];
        $posicion_jugador = $_POST['posicion_jugador'];

        // Obtener el ID del equipo desde la URL (puede ser necesario, dependiendo de tu lógica)
        $id_equipo = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Insertar el jugador en la base de datos
        $sql_insert_jugador = "INSERT INTO jugadores (nombre, numero, posicion, id_equipo) VALUES (?, ?, ?, ?)";
        $stmt_insert_jugador = mysqli_prepare($conexion_bd, $sql_insert_jugador);
        mysqli_stmt_bind_param($stmt_insert_jugador, "sisi", $nombre_jugador, $numero_jugador, $posicion_jugador, $id_equipo);

        if (mysqli_stmt_execute($stmt_insert_jugador)) {
            $mensaje_exito = "Jugador añadido correctamente.";
        } else {
            $mensaje_error = "Error al añadir jugador: " . mysqli_error($conexion_bd);
        }

        mysqli_stmt_close($stmt_insert_jugador);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Equipo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            margin-top: 10px;
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

        nav li {
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            padding: 14px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
            height: 8px;
        }
        .back-button a:hover {
            background-color: #45a049;
        }
        .add-player-form {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .add-player-form label {
            display: block;
            margin-bottom: 5px;
        }

        .add-player-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .add-player-form button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-player-form button:hover {
            background-color: #45a049;
        }


        .success-message {
            position: fixed;
            top: 80px; 
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-align: center;
        }

        .success {
            margin: 0;
        }

        .error {
            margin: 0;
            background-color: #d9534f;
        }

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

        .user-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

    </style>
    <link rel="stylesheet" href="styles.css"> 
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
            $nombre_usuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
            echo "<img src='user.png' alt='avatar'>";
            echo "<p>{$nombre_usuario}</p>";
            ?>
        </div>
        </header>

    <main>
        <div class="back-button">
            <a href="javascript:history.back()" class="more-button">Volver</a>
        </div>
        <section class="team-details-container">
            <?php
            if (isset($_GET['id'])) {
                $id_equipo = intval($_GET['id']);

                
                if ($id_equipo > 0) {
                    $sql_equipo = "SELECT * FROM equipos WHERE id_equipo = ?";
                    $stmt_equipo = mysqli_prepare($conexion_bd, $sql_equipo);
                    mysqli_stmt_bind_param($stmt_equipo, "i", $id_equipo);
                    mysqli_stmt_execute($stmt_equipo);
                    $result_equipo = mysqli_stmt_get_result($stmt_equipo);

                    if ($result_equipo && $equipo = mysqli_fetch_assoc($result_equipo)) {
                        // Información del equipo
                        $nombre_equipo = $equipo['nombre'];
                        $estado_equipo = $equipo['estado'];
                        $anio_fundacion = $equipo['anio_fundacion'];
                        $imagen_equipo = $equipo['imagen'];
                        $descripcion_equipo = $equipo['descripcion'];

                        
                        $sql_estadisticas = "SELECT * FROM estadisticas_partidos WHERE id_equipo = ?";
                        $stmt_estadisticas = mysqli_prepare($conexion_bd, $sql_estadisticas);
                        mysqli_stmt_bind_param($stmt_estadisticas, "i", $id_equipo);
                        mysqli_stmt_execute($stmt_estadisticas);
                        $result_estadisticas = mysqli_stmt_get_result($stmt_estadisticas);

                        if ($result_estadisticas && $estadisticas = mysqli_fetch_assoc($result_estadisticas)) {
                            $partidos_jugados = $estadisticas['partidos_jugados'];
                            $victorias = $estadisticas['victorias'];
                            $derrotas = $estadisticas['derrotas'];
                            $empates = $estadisticas['empates'];
                        }


                        $sql_jugadores = "SELECT * FROM jugadores WHERE id_equipo = ?";
                        $stmt_jugadores = mysqli_prepare($conexion_bd, $sql_jugadores);
                        mysqli_stmt_bind_param($stmt_jugadores, "i", $id_equipo);
                        mysqli_stmt_execute($stmt_jugadores);
                        $result_jugadores = mysqli_stmt_get_result($stmt_jugadores);
                    } else {
                        echo "Equipo no encontrado.";
                    }

                    mysqli_stmt_close($stmt_equipo);
                    mysqli_stmt_close($stmt_estadisticas);
                    mysqli_stmt_close($stmt_jugadores);
                } else {
                    echo "ID de equipo no válido.";
                }
            } else {
                echo "Falta el parámetro 'id' en la URL.";
            }
            ?>

            <div class="team-details">
                <?php if (isset($nombre_equipo)) : ?>
                    <div class="team-image">
                        <img src="<?php echo $imagen_equipo; ?>" alt="<?php echo $nombre_equipo; ?>" style="max-width: 300px; max-height: 300px;">
                    </div>
                   
                    <div class="team-info">
                        <h2><?php echo $nombre_equipo; ?></h2>
                        <p>Estado: <?php echo $estado_equipo; ?></p>
                        <p>Año de Fundación: <?php echo $anio_fundacion; ?></p>
                        <p>Descripción: <?php echo $descripcion_equipo; ?></p>

                        <h2>Estadísticas</h2>
                        <p>Partidos Jugados: <?php echo $partidos_jugados; ?></p>
                        <p>Victorias: <?php echo $victorias; ?></p>
                        <p>Derrotas: <?php echo $derrotas; ?></p>
                        <p>Empates: <?php echo $empates; ?></p>

                        <h2>Jugadores</h2>
        <?php if (mysqli_num_rows($result_jugadores) > 0) : ?>
            <table class="players-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Número</th>
                        <th>Posición</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Imprimir la información de los jugadores
                    while ($jugador = mysqli_fetch_assoc($result_jugadores)) {
                        echo "<tr>";
                        echo "<td>{$jugador['nombre']}</td>";
                        echo "<td>{$jugador['numero']}</td>";
                        echo "<td>{$jugador['posicion']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No hay jugadores registrados en este equipo.</p>
        <?php endif; ?>

    <div class="success-message" id="message-container">
        <?php
        if ($mensaje_exito) {
            echo '<p class="success">' . $mensaje_exito . '</p>';
        } elseif ($mensaje_error) {
            echo '<p class="error">' . $mensaje_error . '</p>';
        }
        ?>
    </div>
    <script>
var messageContainer = document.getElementById('message-container');

if (!messageContainer.innerText.trim()) {
    messageContainer.style.display = 'none';
}
</script>
    <?php
    // Verificar si el usuario es un administrador
    if (esAdmin($conexion_bd, $nombre_usuario)) {
        // Mostrar mensaje y formulario solo para administradores
        echo '<div class="add-player-message">';
        echo '<p>¿Deseas añadir jugadores a este equipo?</p>';
        echo '<div class="add-player-form">';
        echo '<h2>Añadir Jugador</h2>';
        echo '<form action="" method="post">';
        echo '<label for="nombre_jugador">Nombre del Jugador:</label>';
        echo '<input type="text" name="nombre_jugador" required>';
        echo '<label for="numero_jugador">Número del Jugador:</label>';
        echo '<input type="number" name="numero_jugador" required>';
        echo '<label for="posicion_jugador">Posición del Jugador:</label>';
        echo '<input type="text" name="posicion_jugador" required>';
        echo '<button type="submit">Añadir Jugador</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    endif?>
</div>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>