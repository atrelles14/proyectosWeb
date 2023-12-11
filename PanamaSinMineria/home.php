<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panamá Sin Minería</title>
    <!-- Include jQuery and jqGrid CSS and JavaScript -->
    <link rel="stylesheet" type="text/css" href="ui.jqgrid.css" />
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery.jqGrid.min.js"></script>
    <!-- Add your custom CSS -->
    <style>
        @font-face {
            font-family: 'Quicksand';
            src: url('Quicksand-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BebasNeue-Book';
            src: url('../TTF/BebasNeue-Book.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BebasNeue-Light';
            src: url('../TTF/BebasNeue-Light.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BebasNeue-Bold';
            src: url('../TTF/BebasNeue-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BebasNeue-Regular';
            src: url('../TTF/BebasNeue-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BebasNeue-Thin';
            src: url('../TTF/BebasNeue-Thin.ttf') format('truetype');
        }

        body {
            margin: 0;
            padding: 0;
            background: #ffffff; /* Fondo blanco */
            font-family: 'BebasNeue-Bold', Arial, sans-serif; /* Fuente en toda la página */
        }

        .header {
            background: linear-gradient(to bottom, #0C6843, #34926C); /* Fondo con degradado en el encabezado */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Efecto drop shadow hacia abajo */
            padding: 20px; /* Espacio interno en el encabezado */
        }

        .title {
            font-size: 36px; /* Tamaño del título */
            color: #ffffff; /* Color del título */
        }

        .links {
            text-align: right; /* Alinea los enlaces a la derecha */
            padding: 20px; /* Espacio interno en la sección de enlaces */
        }

        .links a {
            text-decoration: none;
            font-weight: bold; /* Fuente gruesa */
            color: #ffffff; /* Color de los enlaces */
            margin: 0 20px; /* Margen entre los enlaces */
        }

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

        .date {
            font-weight: bold;
        }

        /* Add custom styles for the grid container */
        #gridContainer {
            margin: 20px; /* Add margin to the sides */
        }

        /* Adjust the grid size to fit the container */
        #grid {
            width: 100%;
            height: 400px; /* Define your desired height */
        }
    </style>
</head>
<body>
    <div class="info-bar">
        <div class="weather">Temperatura: <span id="temperature">--</span>°C</div>
        <div class="time">Hora: <span id="current-time">--:--</span></div>
        <div class="date">Fecha: <span id="current-date">--/--/--</span></div>
    </div>
    <div class="header">
        <div class="title">Panamá Sin Minería</div>
        <div class="links">
            <a href="protesta_hoy.html">Protesta de hoy</a>
            <a href="contrato_minero.html">Contrato Minero</a>
            <a href="panamasinmineria.php">Conoce quiénes vendieron tu país</a>
        </div>
    </div>
    <!-- Add a container for the hierarchical grid -->
    <div id="gridContainer">
        <table id="grid"></table>
        <div id="pager"></div>
    </div>
    <!-- Include your custom JavaScript to initialize the grid -->
    <script>
        // Función para obtener la temperatura actual (usando un valor de ejemplo)
        function getWeather() {
            // Simulación de una llamada a una API de pronóstico del tiempo
            // Aquí debes integrar una fuente de datos real para obtener la temperatura
            // En este ejemplo, usamos un valor ficticio de 25°C
            const temperatureElement = document.getElementById('temperature');
            temperatureElement.textContent = '25';
        }

        // Función para actualizar la hora actual
        function updateTime() {
            const timeElement = document.getElementById('current-time');
            const currentDate = new Date();
            const hours = String(currentDate.getHours()).padStart(2, '0');
            const minutes = String(currentDate.getMinutes()).padStart(2, '0');
            timeElement.textContent = `${hours}:${minutes}`;
        }

        // Función para actualizar la fecha actual
        function updateDate() {
            const dateElement = document.getElementById('current-date');
            const currentDate = new Date();
            const day = String(currentDate.getDate()).padStart(2, '0');
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const year = currentDate.getFullYear();
            dateElement.textContent = `${day}/${month}/${year}`;
        }

        // Llama a las funciones para mostrar la información
        getWeather(); // Actualiza la temperatura
        updateTime(); // Actualiza la hora actual
        updateDate(); // Actualiza la fecha actual

        // Actualiza la hora cada minuto
        setInterval(updateTime, 60000);
    </script>
</body>
</html>
