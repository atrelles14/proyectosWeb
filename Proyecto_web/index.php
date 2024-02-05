<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_User</title>
    <link rel="stylesheet" type="text/css" href="/Proyecto_web/styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f1f1f1;
}
.logo img {
    width: 30%;
}

form.logout-form {
        margin: 0;
        padding: 0;
            display: flex;
            align-items: center;
        margin-top: -20px;
        }

        form.logout-form button {
            background: #007bff url('/Proyecto_web/icons/css.gg/icons/png/black/log-out.png') no-repeat center left; /* Ruta a tu icono */
            background-size: 20px 20px; /* Ajusta el tamaño del icono según tus preferencias */
            border: none;
            cursor: pointer;
            color: #000000;
            font-weight: 600;
            padding: 8px 40px 8px 20px; /* Ajusta el relleno según tus preferencias */
            margin-left: 10px; /* Ajusta el margen según tus preferencias */
            border-radius: 4px;
            transition: background 0.3s;
        }

        form.logout-form button:hover {
            background: #0056b3 url('/Proyecto_web/icons/css.gg/icons/png/black/log-out.png') no-repeat center left; /* Cambia el color de fondo en hover */
            background-size: 20px 20px; /* Ajusta el tamaño del icono en hover */
            text-decoration: none;
        }
        .background-placeholder {
            height: 200px; /* Ajusta la altura según tus preferencias */
        }

        .main-container form {
            max-width: 600px; /* Ajusta la anchura máxima según tus preferencias */
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 80px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .main-container form p {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #333;
        }

        .main-container form input[type="text"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            width: 100%; /* Hace que la caja de texto ocupe el ancho completo */
        }

        .main-container form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .main-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Agrega un ícono de lupa al campo de búsqueda */
        .main-container form input[type="text"]::placeholder {
            background-image: url('ruta_a_tu_icono/lupa.png'); /* Reemplaza 'ruta_a_tu_icono/lupa.png' con la ruta de tu ícono de lupa */
            background-size: 20px; /* Ajusta el tamaño del ícono según tus preferencias */
            background-repeat: no-repeat;
            background-position: left center;
            padding-left: 30px; /* Ajusta el espacio para el ícono según tus preferencias */
        }

/* Agrega un ícono de lupa al campo de búsqueda */
.main-container form input[type="text"]::placeholder {
    background-image: url('ruta_a_tu_icono/lupa.png'); /* Reemplaza 'ruta_a_tu_icono/lupa.png' con la ruta de tu ícono de lupa */
    background-size: 20px; /* Ajusta el tamaño del ícono según tus preferencias */
    background-repeat: no-repeat;
    background-position: left center;
    padding-left: 30px; /* Ajusta el espacio para el ícono según tus preferencias */
}
footer {
            background: linear-gradient(230deg, #9ADEF5, #007bff);
            color: #000000;
            text-align: left;
            padding: 10px; /* Ajusta el padding según tus preferencias */
            display: cover;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }


        h5{
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 20px;
            text-align: left;
            margin-bottom: -5px;
        }


        h4{
            margin-left: 30px;
        }
        footer .column-container {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: space-between;
            margin-top: 1px;
            align-items: left;
        }

        /* Estilo para cada columna */
        footer .column {
            flex: 1; /* Usamos flex: 1 para que ocupen todo el espacio disponible */
            text-align: left;
            background: transparent;
            margin-bottom: 20px;
        }

            .footer .column:last-child {
        margin-bottom: 0;
        }
        footer .column img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            margin-right:-20px;
        }

        /* Estilo para el contenido dentro de cada columna */
        footer .column p {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            font-size: 12px;
        }

        footer .column h5 {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            margin-bottom: 10px;
        }
</style>
</head>

<body>
    <div class="bg-container">
    <header class="header-container">
        <div class="logo">
            <img src="image/logo.png" alt="logo">
        </div>
        <nav>
        </nav>
        <?php
                echo '<a href="Login.php">Iniciar Sesión</a>';
            ?>
    </header>
    <div class="text-container">
        <div class="text">
            <p>ENCUENTRA LAS LETRAS</p>
        </div>
    </div>
    <div class="text-container2">
        <div class="text2">
            <p>DE TU ARTISTA FAVORITO</p>
        </div>
    </div>
    <div class="text-container3">
        <div class="text3">
            <p>CON UN SOLO CLIC</p>
        </div>
</div>
<div class="main-container">
        <form action="API_canciones/call_api.php" method="post" onsubmit="transformAndSubmit()">
            <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre de la canción aquí" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
            <input type="submit" value="Buscar"><br><br>
        </form>
    </div>
    <div class="background-placeholder"></div>
    <footer>
        <div class="column-container">
            <div class="column">
                <h5>Albáez, Gabriela</h5>
                <p>8-983-1051</p>
                <p>gabriela.albaez@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Romero, Martin</h5>
                <p>8-983-1051</p>
                <p>gabriela.albaez@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Trelles, Andrés</h5>
                <p>8-983-1051</p>
                <p>gabriela.albaez@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Valoy, Britney</h5>
                <p>8-983-1051</p>
                <p>gabriela.albaez@utp.ac.pa</p>
            </div>
        </div>
    </footer>
</body>
</html>