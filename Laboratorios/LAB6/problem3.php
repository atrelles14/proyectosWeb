<?php
class PeliculasPorMes
{
    private $peliculas = [
        'Enero' => 9,
        'Febrero' => 12,
        'Marzo' => 0,
        'Abril' => 17
    ];

    public function mostrarPeliculasPorMes()
    {
        echo "<h2>Películas Vistas por Mes</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Mes</th><th>Cantidad</th></tr>";
        
        foreach ($this->peliculas as $mes => $cantidad) {
            if ($cantidad > 0) {
                echo "<tr><td>$mes</td><td>$cantidad</td></tr>";
            }
        }
        
        echo "</table>";
    }
}

$peliculas = new PeliculasPorMes();
$peliculas->mostrarPeliculasPorMes();
?>

<a href="Laboratorio6.php">Volver al índice</a>
