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
<!-- Equipos -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American Score</title>
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
            <?php
            
            $nombre_usuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

            if (esAdmin($conexion_bd, $nombre_usuario)) {
                // Mostrar el formulario solo si el usuario es admin
                echo "<form action='' method='post' enctype='multipart/form-data'>";                ;
                echo "<h2>Registrar Nuevo Equipo</h2>";

                echo "<label for='nombre'>Nombre del Equipo:</label>";
                echo "<input type='text' name='nombre_equipo' required>";

                echo "<label for='estado'>Estado del Equipo:</label>";
                echo "<select name='estado_equipo' required>";
                echo "<option value='Arizona'>Arizona</option>";
                echo "<option value='Alabama'>Alabama</option>";
                echo "<option value='California'>California</option>";
                echo "<option value='Colorado'>Colorado</option>";
                echo "<option value='Florida'>Florida</option>";
                echo "<option value='Georgia'>Georgia</option>";
                echo "<option value='Illinois'>Illinois</option>";
                echo "<option value='Indiana'>Indiana</option>";
                echo "<option value='Louisana'>Louisana</option>";
                echo "<option value='Maryland'>Maryland</option>";
                echo "<option value='Massachussetts'>Massachussetts</option>";
                echo "<option value='Michigan'>Michigan</option>";
                echo "<option value='Minnesota'>Minnesotta</option>";
                echo "<option value='Missouri'>Missouri</option>";
                echo "<option value='New Jersey'>New Jersey</option>";
                echo "<option value='New York'>New York</option>";
                echo "<option value='North Carolina'>North Carolina</option>";
                echo "<option value='Ohio'>Ohio</option>";
                echo "<option value='Penssylvania'>Penssylvania</option>";
                echo "<option value='Tennessee'>Tennessee</option>";
                echo "<option value='Texas'>Texas</option>";
                echo "<option value='Washington'>Washington</option>";
                echo "<option value='Wisconsin'>Wisconsin</option>";
                echo "</select>";

                echo "<label for='victorias'>Número de Victorias:</label>";
                echo "<input type='number' name='victorias' required>";

                echo "<label for='derrotas'>Número de Derrotas:</label>";
                echo "<input type='number' name='derrotas' required>";

                echo "<label for='empates'>Número de Empates:</label>";
                echo "<input type='number' name='empates' required>";

                echo "<label for='partidos_jugados'>Partidos Jugados:</label>";
                echo "<input type='number' name='partidos_jugados' required>";
                
                echo "<label for='descripcion'>Descripción:</label>";
                echo "<textarea name='descripcion' required></textarea>";
               
                echo "<label for='anio_fundacion'>Año de Fundación:</label>";
                echo "<input type='number' name='anio_fundacion' required>";
                
                echo "<label for='imagen'>Imagen del Equipo:</label>";
echo "<input type='file' name='imagen' accept='image/*' required>";

                echo "<button type='submit'>Registrar Equipo</button>";
                echo "</form>";
            } else {
                echo "<p>Lo siento, no tienes permisos para añadir equipos.</p>";
            }
            ?>

<div class="team-table">
                <table>
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Equipo</th>
                            <th>Estado</th>
                            <th>Año de Fundación</th>
                            <th>Ver más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_equipos = "SELECT * FROM equipos";
                        $result_equipos = mysqli_query($conexion_bd, $sql_equipos);

                            if ($result_equipos->num_rows > 0) {
                        while ($equipo = mysqli_fetch_assoc($result_equipos)) {
                            echo "</tr>";

                            echo "<td><img src='{$equipo['imagen']}' alt='Equipo {$equipo['nombre']}' style='max-width: 150px; max-height: 150px;'></td>";

                            echo "<td>{$equipo['nombre']}</td>";
                            echo "<td>{$equipo['estado']}</td>";
                            echo "<td>{$equipo['anio_fundacion']}</td>";
                            echo "<td><a href='equipo.php?id={$equipo['id_equipo']}'><button class='more-button'>Más información</button></a></td>";
                            echo "</tr>";
                        }

                            }else {
                            echo "<tr><td colspan='5'>No hay equipos en la tabla.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
        </div>
        </section>
    </main>
    <footer>

    <?php
    // Mostrar mensaje de la cookie en el ribbon
    if (isset($_COOKIE['ultimo_equipo_visitado'])) {
        $ultimo_equipo_visitado = $_COOKIE['ultimo_equipo_visitado'];
        echo "<div class='ribbon'>";
        echo "¡Hola de nuevo! Tu último equipo visitado fue: $ultimo_equipo_visitado";
        echo "</div>";
    }
    ?>
    </footer>
</body>

</html>

