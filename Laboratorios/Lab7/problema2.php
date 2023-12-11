<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>

<?php
$xml = simplexml_load_file('ciudades.xml');
?>

<h2>Ciudades</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>País</th>
        <th>Continente</th>
    </tr>

    <?php foreach ($xml->Ciudad as $ciudad): ?>
        <tr>
            <td><?= $ciudad->Nombre ?></td>
            <td><?= $ciudad->País ?></td>
            <td><?= $ciudad['Continente'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>
    <p>Andrés Trelles | 1SF133</p>
</footer>

</body>
</html>
