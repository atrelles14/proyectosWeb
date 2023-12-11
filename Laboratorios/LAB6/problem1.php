<?php
class MenuPlatos
{
    private $platosCarta = array(
        'Lomo Saltado' => 'carne, papa frita y arroz',
        'Pollo Saltado' => 'Pollo saltado, papa frita, arroz y ensalada',
        'Pescado Frito' => 'Pescado frito, frejoles y ensalada'
    );

    public function mostrarMenu()
    {
        echo "<h2>Menú de Platos a la Carta</h2>";
        echo "<ul>";
        foreach ($this->platosCarta as $plato => $descripcion) {
            echo "<li>$plato: $descripcion</li>";
        }
        echo "</ul>";
    }
}
$menu = new MenuPlatos();
$menu->mostrarMenu();
?>


<a href="Laboratorio6.php">Volver al índice</a>