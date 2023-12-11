<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
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
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin: 20px;
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

        .image-info {
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            display: none;
        }

        .grid-item:hover .image-info {
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
        <ul>
            <li>Elemento 1</li>
            <li>Elemento 2</li>
            <li>Elemento 3</li>
        </ul>
    </div>
    <div class="grid-container">
        <?php
        for ($i = 1; $i <= 2; $i++) {
            $imagePath = "diputado" . $i . ".jpg";


            $imageAlt = "Imagen " . $i;
            echo '<div class="grid-item">';
            echo "<img src='$imagePath' alt='$imageAlt'>";
            echo '<div class="image-info">diputado' . $i . '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <script>
        function toggleMenu() {
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('show');
        }
    </script>
</body>
</html>
