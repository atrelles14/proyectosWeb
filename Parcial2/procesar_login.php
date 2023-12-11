<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'ConexionBD.php';

$mensaje_exito = '';
$mensaje_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    if (iniciarSesion($nombre_usuario, $contrasena, $conexion_bd)) {
        $_SESSION['nombre'] = $nombre_usuario;
        $mensaje_exito = "Has ingresado correctamente";
        header("Location: equipos.php");
        exit();
    } else {
        $mensaje_error = "Error al iniciar sesión. Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

</head>
<body>
    <section>
        <div class="container">
            <div class="user loginBx">

                <div class="message-container">
                    <?php
                    if ($mensaje_exito) {
                        echo '<p class="success">' . $mensaje_exito . '</p>';
                    } elseif ($mensaje_error) {
                        echo '<p class="error">' . $mensaje_error . ' <a href="login.html">Volver al inicio de sesión</a></p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
