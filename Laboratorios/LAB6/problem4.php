<!DOCTYPE html>
<html>
<head>
    <title>Personas y Edades</title>
</head>
<body>
    <h1>Personas y Edades</h1>
    
    <?php
    $personas = array(
        'Macarena' => 25,
        'Juan' => 30,
        'Alberto' => 14,
        'Santiago' => 21,
        'Eva' => 17,
        'Rocío' => 18,
        'Rodrigo' => 15,
        'Mateo' => 8
    );

    $maxEdad = 0;
    $personaMayor = '';

    foreach ($personas as $nombre => $edad) {
        if ($edad > $maxEdad) {
            $maxEdad = $edad;
            $personaMayor = $nombre;
        }
    }

    echo "<p>La persona de mayor edad es $personaMayor con $maxEdad años.</p>";
    ?>
</body>
</html>

<a href="Laboratorio6.php">Volver al índice</a>
