<?php

$conexion_bd = @mysqli_connect("localhost", "root", "admin", "parcial2");
if (!$conexion_bd) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario de inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    // Recupera los demás campos según tus requisitos

    // Insertar datos en la tabla de equipos
    $sql_insert_equipo = "INSERT INTO equipos (nombre, estado, anio_fundacion, imagen, descripcion) 
                          VALUES ('$nombre', 'estado_default', 2023, 'imagen_default.jpg', 'Descripción por defecto')";

    if (mysqli_query($conexion_bd, $sql_insert_equipo)) {
        echo "Equipo insertado correctamente.";
    } else {
        echo "Error al insertar equipo: " . mysqli_error($conexion_bd);
    }
}

// Recuperar y mostrar todos los equipos
$sql = "SELECT * FROM equipos";
$resultado = mysqli_query($conexion_bd, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($equipo = mysqli_fetch_assoc($resultado)) {
        echo "Nombre: " . $equipo["nombre"] . "<br>";
        echo "Estado: " . $equipo["estado"] . "<br>";
        echo "Año de Fundación: " . $equipo["anio_fundacion"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No hay equipos en la base de datos.";
}

mysqli_close($conexion_bd);
?>
