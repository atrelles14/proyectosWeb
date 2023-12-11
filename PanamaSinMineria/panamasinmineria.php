<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panama Sin Mineria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.3s;
        }

        .navbar.show {
            left: 0;
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            margin: 10px;
        }

        .grid-container {
            margin: 110px 200px 110px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(10, 1fr);
            gap: 10px;
        }

        .grid-item {
            position: relative;
            overflow: hidden;
            border: 2px solid #fff;
        }

        .grid-item img {
            width: 100%;
            height: 100%;
            transition: opacity 0.3s;
        }

        .grid-item:hover img {
            opacity: 0.7;
        }

        .header {
            background: linear-gradient(to bottom, #0C6843, #34926C);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            text-align: left;
            color: #fff;
        }

        .title {
            font-size: 36px;
        }

        .links {
            text-align: right;
            padding: 20px;
        }

        .links a {
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            margin: 0 20px;
        }

        /* Info-bar styles for the temperature, time, and date (copied from home.php) */
        .info-bar {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .info-bar div {
            display: inline-block;
            margin: 0 20px;
            font-size: 16px;
        }

        .weather {
            font-weight: bold;
        }

        .time {
            font-weight: bold;
        }

        .subtitulo{
            font-weight:bolder;
            color: #000;
            
        }

        .date {
            font-weight: bold;
        }

        /* Botón de "Atrás" */
        .back-button {
            position: absolute;
            top: 200px;
            left: 50px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #555;
        }

        .back-button::before {
            content: '\2190'; /* Código Unicode para una flecha hacia la izquierda */
            margin-right: 10px;
        }

        /* Estilos para la información de la imagen */
        .image-info {
            background-color: rgba(51, 51, 51, 0.8); /* Fondo semitransparente */
            color: #fff;
            padding: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            display: show;
            text-align: center;
            transition: background-color 0.3s;
        }

        /* Estilos para el título de la imagen */
        .image-info h3 {
            font-size: 18px;
            margin: 18px;
        }

        /* Estilos para la descripción corta del diputado */
        .image-info p {
            font-size: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <!-- Botón de "Atrás" -->
    <button class="back-button" onclick="goBack()">Atrás</button>

    <!-- Info-bar for temperature, time, and date (copied from home.php) -->
    <div class="info-bar">
        <div class="weather">Temperatura: <span id="temperature">--</span>°C</div>
        <div class="time">Hora: <span id="current-time">--:--</span></div>
        <div class="date">Fecha: <span id="current-date">--/--/--</span></div>
    </div>

    <!-- Header (copied from home.php) -->
    <div class="header">
        <div class="title">Panama Sin Mineria</div>
        <div class="links">
            <a href="protesta_hoy.html">Protesta de hoy</a>
            <a href="contrato_minero.html">Contrato Minero</a>
            <a href="panamasinmineria.php">Conoce quiénes vendieron tu país</a>
        </div>
    </div>

    <!-- Resto de tu contenido (grid) -->
    <div class="grid-container">
    <?php
    for ($i = 1; $i <= 48; $i++) {
        // Excluye la imagen número 24
        if ($i == 24) {
            continue;
        }

        $imagePath = "diputado" . $i . ".jpg";
        $imageAlt = "diputado " . $i;

        // Verifica si el archivo de imagen existe antes de mostrarlo.
        if (file_exists($imagePath)) {
            echo '<div class="grid-item">';
            echo "<img src='$imagePath' alt='$imageAlt'>";
            // Agrega la información del diputado (título y descripción)
            echo '<div class="image-info">';
            if ($i == 1) {
                echo '<h3>Roberto Abrego</h3>';
                echo '<p>Circuito 8-5</p>';
                echo '<p>PRD</p>';
            } elseif ($i == 2) {
                echo '<h3>Corina Cano</h3>';
                echo '<p>Circuito 8-7</p>';
                echo '<p>Molirena</p>';
            } elseif ($i == 3) {
                echo '<h3>Arnulfo Díaz de León</h3>';
                echo '<p>Circuito 5-1</p>';
                echo '<p> Cambio Democrático</p>'
            } elseif ($i == 4) {
                echo '<h3>Everardo Concepción</h3>';
                echo '<p>Circuito 4-2';
                echo '<p>Partido Panameñista';
            } elseif ($i == 5) {
                echo '<h3>Julio Mendoza</h3>';
                echo '<p>Circuito 6-2';
                echo '<p>PRD</p>';
            } elseif ($i == 6) {
                echo '<h3>Roberto Ayala</h3>';
                echo '<p>Circuito 8-5';
                echo '<p>PRD</p>';
            } elseif ($i == 7) {
                echo '<h3>Fatima Agrazal</h3>';
                echo '<p>Circuito 9-1';
                echo '<p>Cambio Democrático</p>';
            } elseif ($i == 8) {
                echo '<h3>Leopoldo Archibold</h3>';
                echo '<p>Circuito 12-1';
                echo '<p>Cambio Democrático';
            } elseif ($i == 9) {
                echo '<h3>Juan Esquivel</h3>';
                echo '<p>Circuito 4-3';
                echo '<p>PRD';
            } elseif ($i == 10) {
                echo '<h3>Hernan Delgado</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 11) {
                echo '<h3>Francisco Aleman</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 12) {
                echo '<h3>Nelson Jackson</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 13) {
                echo '<h3>Leopoldo Benedetti</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 14) {
                echo '<h3>Leandro Ávila</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 15) {
                echo '<h3>Marylin Vallarino</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 16) {
                echo '<h3>Gonzalo González</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 17) {
                echo '<h3>Tito Rodríguez</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 18) {
                echo '<h3>Yanibel Abrego</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 19) {
                echo '<h3>Ariel Alba</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 20) {
                echo '<h3>Alejandro Castillero</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 21) {
                echo '<h3>Jose Herrera</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 22) {
                echo '<h3>Miguel Fanovich</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 23) {
                echo '<h3>Alain Cedeño</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 25) {
                echo '<h3> Mariano López</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 26) {
                echo '<h3>De Olivares</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 27) {
                echo '<h3>Santo Ricardo</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 28) {
                echo '<h3>Petita Ayarza</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 29) {
                echo '<h3>Víctor Castillo</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 30) {
                echo '<h3>Kayra Harding</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 31) {
                echo '<h3>Benicio Robinson</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 32) {
                echo '<h3>Manolo Ruiz</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 33) {
                echo '<h3>Jairo Salazar</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 34) {
                echo '<h3>Néstor Guardia</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 35) {
                echo '<h3>Alina González</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 36) {
                echo '<h3>Ricardo Torres</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 37) {
                echo '<h3>Cenobia Vargas</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 38) {
                echo '<h3>Jaime Vargas</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 39) {
                echo '<h3>Bernardino González</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 40) {
                echo '<h3>Marcos Castillero</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 41) {
                echo '<h3>Luis Cruz</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 42) {
                echo '<h3>Eric Broce</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 43) {
                echo '<h3>Melchor Herrera</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 44) {
                echo '<h3>Arquesio Arias</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 45) {
                echo '<h3>Dalia Bernal</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 46) {
                echo '<h3>Fernando Arce</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 47) {
                echo '<h3>Héctor Brands</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            } elseif ($i == 48) {
                echo '<h3>[NOMBRE DEL DIPUTADO]</h3>';
                echo '<p>Circuito [AÑADE EL CIRCUITO]';
                echo '<p>[AÑADE EL PARTIDO POLÍTICO]';
            }
            echo '</div>'; // Cierre de .image-info
            echo '</div>'; // Cierre de .grid-item
        }
    }
    ?>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
