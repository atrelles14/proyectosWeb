<!DOCTYPE html>
<html>
<head>
    <title>Matriz de Alumnos</title>
</head>
<body>
    <h1>Matriz de Alumnos</h1>
    
    <?php
    $idiomas = ['Inglés', 'Francés', 'Alemán', 'Portugués'];
    $niveles = ['Básico', 'Medio', 'Perfeccionamiento'];

    $matrizAlumnos = [
        ['Nivel/Idioma', 'Inglés', 'Francés', 'Alemán', 'Portugués'],
        ['Básico', 1, 14, 8, 3],
        ['Medio', 6, 19, 7, 2],
        ['Perfeccionamiento', 3, 13, 4, 1]
    ];

    echo '<table border="1">';
    foreach ($matrizAlumnos as $fila) {
        echo '<tr>';
        foreach ($fila as $valor) {
            echo '<td>' . $valor . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
<a href="Laboratorio6.php">Volver al índice</a>
</body>
</html>

