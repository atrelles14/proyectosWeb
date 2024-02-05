<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "parcial2";

// Crear conexión utilizando MySQLi
$conexion_bd = @mysqli_connect($servername, $username, $password, $dbname);
if (!$conexion_bd) {
    die("Error de conexión: " . mysqli_connect_error());
}
function registrarUsuario($username, $password, $conexion_bd)
{
    // Cifrar la contraseña utilizando password_hash
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    //Seguridad
    $stmt = mysqli_prepare($conexion_bd, "INSERT INTO usuarios_data (username, hashed_password, rol) VALUES (?, ?, ?)");
    $default_rol = 'usuario';
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $default_rol);

    if (mysqli_stmt_execute($stmt)) {
        return true; //Registro exitoso
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function iniciarSesion($username, $password, $conexion_bd) {
    $query = "SELECT hashed_password FROM usuarios_data WHERE username = ?";
    
    $stmt = mysqli_prepare($conexion_bd, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password);

    if (mysqli_stmt_fetch($stmt)) {
        // Verifica la contraseña
        if (password_verify($password, $hashed_password)) {
            return true; //Contraseña válida
        }
    }

    return false; //Usuario o contraseña incorrectos
}
function esAdmin($conexion_bd, $nombre_usuario) {
    $stmt = mysqli_prepare($conexion_bd, "SELECT rol FROM usuarios_data WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $nombre_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $rol);

    if (mysqli_stmt_fetch($stmt)) {
        // Verifica si el rol es admin
        if ($rol === 'admin') {
            return true;
        }
    }

    return false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_equipo'])) {
    $nombre_equipo = $_POST['nombre_equipo'];
    $estado_equipo = $_POST['estado_equipo'];
    $victorias = $_POST['victorias'];
    $derrotas = $_POST['derrotas'];
    $empates = $_POST['empates'];
    $partidos_jugados = $_POST['partidos_jugados'];
    $descripcion = $_POST['descripcion'];
    $anio_fundacion = $_POST['anio_fundacion'];

$nombre_imagen = $_FILES['imagen']['name'];
$ruta_destino = "images/" . $nombre_imagen; //Carpeta "images" en el mismo directorio del proyecto

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
    //Insertar datos en la tabla de equipos, incluyendo la ruta de la imagen
    $sql_insert_equipo = "INSERT INTO equipos (nombre, estado, anio_fundacion, descripcion, imagen) 
                        VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion_bd, $sql_insert_equipo);
    mysqli_stmt_bind_param($stmt, "ssiss", $nombre_equipo, $estado_equipo, $anio_fundacion, $descripcion, $ruta_destino);

    if (mysqli_stmt_execute($stmt)) {
        echo "Equipo insertado correctamente.";

        //Recuperar el ID del equipo recién insertado
        $id_equipo = mysqli_insert_id($conexion_bd);

        $sql_insert_estadisticas = "INSERT INTO estadisticas_partidos (id_equipo, partidos_jugados, victorias, derrotas, empates) 
                                    VALUES (?, ?, ?, ?, ?)";
        $stmt_estadisticas = mysqli_prepare($conexion_bd, $sql_insert_estadisticas);
        mysqli_stmt_bind_param($stmt_estadisticas, "iiiii", $id_equipo, $partidos_jugados, $victorias, $derrotas, $empates);

        if (mysqli_stmt_execute($stmt_estadisticas)) {
            echo "Estadísticas insertadas correctamente.";
        } else {
            echo "Error al insertar estadísticas: " . mysqli_error($conexion_bd);
        }
    } else {
        echo "Error al insertar equipo: " . mysqli_error($conexion_bd);
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_estadisticas);
} else {
    echo "Error al cargar la imagen.";
}

}