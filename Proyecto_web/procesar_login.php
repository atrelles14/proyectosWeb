<?php
session_start();

// Datos de conexión
$nombreservidor = "localhost";
$nombreusuario = "root";
$password = "";
$basedatos = "prueba";

// Estableciendo conexion con la BD
$conn = new mysqli($nombreservidor, $nombreusuario, $password, $basedatos);

// Verificando la conexion con la BD
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Obteniendo los datos de formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consulta SQL para verifical el usuario
$sql = "SELECT*FROM Usuario WHERE Usu_user='$usuario' AND Usu_password='$password'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    //Usuario autenticado correctamente
    $row = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo_usuario'] = $row['Usu_tipo'];
    $_SESSION['id_usuario'] = $row['Usu_ID'];

    if ($_SESSION['tipo_usuario'] == 'admin') {
        header("Location: VIEW_ADMINS/index_admin.php"); // Redirecciona a la página para admin
    } else {
        header("Location: VIEW_USERS/index_users.php"); // Redirecciona a la página de usuario regular
    }
}else {
    // Usuario no encontrado 
    $mensajeError = "Nombre de usuario o contraseña incorrecta: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('image/Fondo_mensaje.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            text-align: center;
        }

        .message-box {
            background: rgba(0, 0, 0, 0.7); /* Fondo semi-transparente */
            padding: 20px;
            border-radius: 10px;
        }

        .message-box p {
            margin-bottom: 15px;
        }

        .message-box a {
            color: #fff;
            text-decoration: none;
            background-color: #677eff;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .message-box a:hover {
            background-color: #4750cc;
        }
    </style>
</head>
<body>
    <div class="message-box">
    <?php
    if (!empty($mensajeError)) {
        echo "<p>$mensajeError</p>";
        echo '<a href="Login.php">Ir a Iniciar Sesión</a>';
    }
    ?>
    </div>
</body>
</html>