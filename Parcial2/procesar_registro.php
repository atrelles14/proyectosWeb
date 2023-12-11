<?php
include_once 'conexionBD.php';

$mensaje_exito = '';
$mensaje_error = '';

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Llamar a la función de registro
    if (registrarUsuario($nombre_usuario, $contrasena, $conexion_bd)) {
        $mensaje_exito = "Usuario registrado correctamente. ¡Bienvenido!";
        header("Location: login.html");
        exit(); 
    } else {
        $mensaje_error = "Error al registrar usuario. Inténtalo de nuevo.";
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
            <div class="user registerBx">
                <div class="message-container">
                    <?php
                    if ($mensaje_exito) {
                        echo '<p class="success">' . $mensaje_exito . '</p>';
                    } elseif ($mensaje_error) {
                        echo '<p class="error">' . $mensaje_error . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
