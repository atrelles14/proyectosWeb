<!DOCTYPE html>
<html>
<head>
    <title>Capitales de Países</title>
</head>
<body>
    <h1>Capitales de Países</h1>
    
    <?php
    include 'problem5.php';
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="pais">Introduce un país:</label>
        <input type="text" name="pais" id="pais">
        <br>
        <input type="submit" value="Obtener Capital">
    </form>

    <a href="Laboratorio6.php">Volver al índice</a>
</body>
</html>