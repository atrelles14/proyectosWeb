<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcadores personales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 50px;
        }
        .ribbon {
            background-color: #013220;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;    
        }
        h1 {
            font-size: 2em;
            margin: 0;
            line-height: 5;
        }
        p {
            margin: 0;
        }
        .bookmarks {
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px;
        }
        .bookmark {
            border: 1px solid #ddd;
            padding: 50px;
            border-radius: 8px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="ribbon">
    <h1>Mis Marcadores</h1>
    <p>Andrés Trelles</p>
    <p>1SF133</p>
</div>

<?php
$xml = simplexml_load_file('marcadores.xml');
?>

<div class="bookmarks">
    <?php foreach ($xml->page as $page): ?>
        <div class="bookmark">
            <h2><?= $page->name ?></h2>
            <p><?= $page->description ?></p>
            <a href="<?= $page->url ?>" target="_blank">Visitar página</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
