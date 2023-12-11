<?php
class NumerosAleatorios
{
    private $numeros;

    public function __construct()
    {
        $this->numeros = [];
        for ($i = 0; $i < 10; $i++) {
            $this->numeros[] = rand(1, 100);
        }
    }

    public function encontrarMayorYMenor()
    {
        $max = max($this->numeros);
        $min = min($this->numeros);
        echo "<h2>Números Aleatorios</h2>";
        echo "<p>Números generados: " . implode(', ', $this->numeros) . "</p>";
        echo "<p>Número mayor: $max</p>";
        echo "<p>Número menor: $min</p>";
    }
}
$aleatorios = new NumerosAleatorios();
$aleatorios->encontrarMayorYMenor();
?>


<a href="Laboratorio6.php">Volver al índice</a>