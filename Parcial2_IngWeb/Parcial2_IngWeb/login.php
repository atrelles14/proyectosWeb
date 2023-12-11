<?php
// login.php

// Verificar si el formulario de inicio de sesión ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validar_credenciales($username, $password)) {
        session_start();

        $_SESSION['authenticated'] = true;

        header('Location: index.php');
        exit();
    } else {
        $error_message = 'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>

    <form method="post" action="login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

<?php
function validar_credenciales($username, $password) {

    return ($username === 'usa' && $password === 'contra');
}
?>
