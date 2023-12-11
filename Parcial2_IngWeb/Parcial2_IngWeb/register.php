<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Equipos</title>
    <style>
        body {
            background-color: #F2F2F2;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Registro de Equipos</h2>
    <form method="post" action="procesar_registro_equipo.php" enctype="multipart/form-data">
        <label for="nombre_equipo">Nombre del Equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required>

        <label for="estado_equipo">Estado del Equipo:</label>
        <input type="text" id="estado_equipo" name="estado_equipo" required>

        <label for="victorias">Victorias:</label>
        <input type="number" id="victorias" name="victorias" required>

        <label for="derrotas">Derrotas:</label>
        <input type="number" id="derrotas" name="derrotas" required>

        <label for="empates">Empates:</label>
        <input type="number" id="empates" name="empates" required>

        <label for="partidos_jugados">Partidos Jugados:</label>
        <input type="number" id="partidos_jugados" name="partidos_jugados" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4"></textarea>

        <label for="anio_fundacion">Año de Fundación:</label>
        <input type="number" id="anio_fundacion" name="anio_fundacion" required>

        <label for="imagen">Imagen del Equipo:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <button type="submit">Registrar Equipo</button>
    </form>
</body>
</html
