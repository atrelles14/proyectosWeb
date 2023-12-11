<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(); 
}
$username = $_SESSION['usuario'];
$id_usuario = $_SESSION['id_usuario'];
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

//Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $url_imagen = $_POST['imagen_cancion'];
    $nombre_cancion = $_POST['nombre_cancion'];
    $nombre_artista = $_POST['nombre_artista'];

    //Preparar la consulta para insertar en la base de datos
    $sql = "INSERT INTO favoritos (Fav_ID_cancion, Fav_url, Fav_nombre_cancion, Fav_artista_cancion, Fav_ID_usuario) VALUES ('$id', '$url_imagen', '$nombre_cancion', '$nombre_artista', '$id_usuario')";

    if ($conn->query($sql) === TRUE) {
        $mensajeExito = "Canción añadida a favoritos correctamente";

    //Cookie que almacena ultima canción agregada a favoritos
    $cookie_name = "favorito_" . $id_usuario; 
    $cookie_value = json_encode(array('nombre_cancion' => $nombre_cancion, 'nombre_artista' => $nombre_artista));
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    } else {
        $mensajeError = "Error al añadir canción a favoritos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <title>Respuesta</title>
        <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            font-family: sans-serif;
        }
        .logo img {
        width: 30%;
        }

        html {
        min-height: 100%;
        }      
        
        
        .main-container{
            margin-left:450px;
            justify-content: relative;
            align-items: center;
            flex-direction: column; /* Alinea los elementos verticalmente */
            padding: 20px;
            text-align: center; /* Centra el texto dentro del contenedor */

        }

        h1{
            margin-left:10px;
            margin-top: 20px;
            font-size: 30px;
        }

        .mensaje {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        margin-top: 50px;
        margin-bottom:160px;
        margin-left: 30%;
        width: 500px;
        }

        .mensaje p {
        margin-bottom: 10px;
}

        .mensaje a {
        display: block;
        text-decoration: none;
        color: #007bff;
        margin-top: 10px;
}
    
        .back-to-home-btn {
            background-color: rgba(138, 166, 179, 0.7);
            color: #fff;
            padding: 10px 10px;
            border-radius: 30px;
            transition: 0.5s;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            margin-left: 20px;
        }
        
        .back-to-home-btn img {
    width: 20px; /* Ajusta el ancho de la flecha */
    height: 20px; /* Ajusta la altura de la flecha */
    margin-right: 5px; /* Ajusta el espacio entre la flecha y el texto */
}

        .back-to-home-btn:hover {
            background-color: #1c1c1c;
        }

        /* Estilos para la barra de búsqueda */
        .option-container {
        font-family: 'Poppins', sans-serif;
        background-color: #27323D; /* o cualquier otro color para identificar su posición */
        height: 70px;
        color: #000000;
        position: relative;
            z-index: 1; /* Asegura que .option-container esté por encima del contenido del body */
        }

        .search-box {
            display: flex;
            align-items: center;
            margin-top: -80px;
        }


        .input-search {
            font-family: 'Poppins', sans-serif;
            height: 10px;
            width: 170px;
            border-style: none;
            padding: 10px 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 25px;
            transition: all .5s ease-in-out;
            background-color: rgba(138, 166, 179, 0.7); /* Cambia el valor de rgba para ajustar la opacidad */
            padding-right: 40px;
            color: #fff;
            margin-right: 10px; /* Espaciado entre el ícono y el input */
        }

        .input-search::placeholder {
            font-family: 'Poppins', sans-serif;
            color: rgba(255, 255, 255, .5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search {
            font-family: 'Poppins', sans-serif;
            width: 30px;
            height: 30px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            color: #ffffff;
            background-color: transparent;
            pointer-events: painted;
            margin-right: 30px;
        }

        .btn-search:focus~.input-search {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, .5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .input-search:focus {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, .5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        form.search-form {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #000000;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-right: 250px;
        }

        nav ul li a {
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            color: #000000;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
            transition: 0.5s;
        }

        .cuenta {
            display: flex;
            align-items: center;
        }

        .cuenta img {
            width: 48px;
            height: 50px;
            margin-left: 10px;
        }

        .personal_info {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        nav ul li a.btn-login {
            background-color: #2a2a2a;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            transition: 0.5s;
        }

        nav ul li a.btn-login:hover {
            background-color: #1c1c1c;
        }
        .table-container {
    margin: 100px auto; /* Establece un margen superior e inferior de 100px y centrará horizontalmente */
    padding: 20px; /* Establece el padding a 20px */
    width: 80%; /* Puedes ajustar el ancho según tus preferencias */
    overflow-y: auto;
    display: flex;
    justify-content: center; /* Centra horizontalmente los elementos flexibles dentro del contenedor */
    align-items: center; /* Centra verticalmente los elementos flexibles dentro del contenedor */
}



        th, td {
            font-family: 'Poppins', sans-serif;
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td img {
            width: 50%;
            heigth: auto;
        }
        form.logout-form {
        margin: 0;
        padding: 0;
            display: flex;
            align-items: center;
        margin-top: -20px;
        }

        form.logout-form button {
            font-family: 'Poppins', sans-serif;
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
        footer {
            background: linear-gradient(230deg, #9ADEF5, #007bff);
            color: #000000;
            text-align: left;
            padding: 10px; /* Ajusta el padding según tus preferencias */
            display: cover;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: auto;
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
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
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
        <header class="header-container">
    <div class="logo">
        <a href="../VIEW_USERS/index_users.php">
            <img src="../image/logo.png" alt="logo">
        </a>
    </div>
        <nav>
            <ul>
                <li><a href="../VIEW_USERS/favoritos_user.php"> Mis Favoritos</a></li>
            </ul>
        </nav>
        <div class="cuenta">
            <a href="../VIEW_USERS/perfil_user.php">
            <img src="/Proyecto_web/icons/css.gg/icons/png/white/arrow-long-left.png" alt="Volver atrás">
            </a>
            <div class="personal_info">
            ¡Hola <?php echo $username; ?>!<br><br>
                <form action="../cerrar_sesion.php" method="post" class="logout-form">
                <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
            </form>
            </div>
        </div>
    </header>
<body>
<div class="option-container">
        <!-- Utilizamos JavaScript para llamar a la función history.back() -->
        <a href="index_users.php" class="back-to-home-btn">
        <img src="/Proyecto_web/icons/css.gg/icons/png/white/arrow-long-left.png" alt="Volver atrás">
            Volver al Home
        </a>
        <form action="../API_canciones/call_api_user.php" method="post" class="search-form">
            <div class="search-box">
                <input type="text" name="nombre" id="nombre" class="input-search" placeholder="Buscar canción">
                <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
<div class="mensaje">
<?php
    // Si es un mensaje de registro exitoso
    if (!empty($mensajeExito)) {
        echo "<p>$mensajeExito</p>";
        echo '<a href="../VIEW_USERS/index_users.php">Ir a Home</a>';
    } else {
        echo "<p>$mensajeError</p>";
        echo '<a href="../VIEW_USERS/index_users.php">Ir a Home</a>';
    }
    
    ?>
</div>
<footer>
        <div class="column-container">
            <div class="column">
                <h5>Albáez, Gabriela</h5>
                <p>8-983-1051</p>
                <p>gabriela.albaez@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Romero, Martin</h5>
                <p>8-985-772</p>
                <p>martin.romero@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Trelles, Andrés</h5>
                <p>8-971-969</p>
                <p>andres.trelles@utp.ac.pa</p>
            </div>
            <div class="column">
                <h5>Valoy, Britney</h5>
                <p>8-998-213</p>
                <p>britney.valoy@utp.ac.pa</p>
            </div>
        </div>
    </footer>
</body>
</html>