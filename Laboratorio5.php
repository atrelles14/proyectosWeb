<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio 5</title>
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="center">Laboratorio 5</h1>
    <br> Estudiante: <strong> Andrés Trelles </strong> Cédula: <strong> 8-971-969 </strong>
    <br> <strong>Laboratorio de PHP</strong>
    <br>
    <br><strong>Problema 1: Calculadora de aumento salarial anual</strong>
    <br>
    <form action="Laboratorio5.php" method="get">
        <label for="aniosEmpresa">Años en la empresa:</label>
        <input type="number" id="aniosEmpresa" name="aniosEmpresa" required>
        <br>
        <input type="submit" class="btn btn-primary" value="Calcular Sueldo">
    </form>
</body>
</html>

    <?php
    $salarioAnual = 40000;
    $aniosEnEmpresa = isset($_GET['aniosEmpresa']) ? intval($_GET['aniosEmpresa']) : null;

    if ($aniosEnEmpresa !== null) {
        if ($aniosEnEmpresa > 10) {
            $aumento = $salarioAnual * 0.10;
        } elseif ($aniosEnEmpresa > 5) {
            $aumento = $salarioAnual * 0.07;
        } elseif ($aniosEnEmpresa > 3) {
            $aumento = $salarioAnual * 0.05;
        } else {
            $aumento = $salarioAnual * 0.03;
        }

        $sueldoTotal = $salarioAnual + $aumento;
        echo "<br><strong>El sueldo anual del trabajador es:</strong> $" . $sueldoTotal;
        echo "<br>";
    }
    ?>

<!-- Problema 2: Cálculo de horas extras -->
<br><strong>Problema 2:Calculadora de Horas extras</strong>
    <br>
    <form action="Laboratorio5.php" method="get">
        <br>
        <label for="horasTrabajadas">Horas Trabajadas por usted:</label>
        <input type="number" id="horasTrabajadas" name="horasTrabajadas" required>
        <br>
        <input type="submit" value="Calcular Sueldo">
    </form>
</body>
</html>
<?php
    $salarioPorHora = 15;
    $horasNormales = 35;
    $tarifaExtra = 22;
    $horasTrabajadas = isset($_GET['horasTrabajadas']) ? intval($_GET['horasTrabajadas']) : null;
    if ($horasTrabajadas !== null) {
        if ($horasTrabajadas <= $horasNormales) {
            $salarioTotal = $salarioPorHora * $horasTrabajadas;
        } else {
            $horasExtras = $horasTrabajadas - $horasNormales;
            $salarioTotal = ($salarioPorHora * $horasNormales) + ($tarifaExtra * $horasExtras);
        }

        echo "<br>El salario semanal es de: $<strong>" . $salarioTotal . "</strong>";
        echo "<br>";
    }
?>
<!-- Problema 3: Cálculo de descuento -->
<br>
<br><strong>Problema 3:Calculadora de Descuento</strong>
<br>
<form action="Laboratorio5.php" method="get">
    <label for="nombreCliente">Nombre del Cliente:</label>
    <input type="text" id="nombreCliente" name="nombreCliente" required>
    <br>
    <label for="tipoCliente">Tipo de Cliente (1, 2, 3):</label>
    <input type="number" id="tipoCliente" name="tipoCliente" required>
    <br>
    <label for="precioArticulo">Precio del artículo:</label>
    <input type="text" id="precioArticulo" name="precioArticulo" required>
    <br>
    <input type="submit" value="Calcular Descuento">
</form>
</body>
</html>
<?php
$nombreCliente = isset($_GET['nombreCliente']) ? $_GET['nombreCliente'] : null;
$tipoCliente = isset($_GET['tipoCliente']) ? intval($_GET['tipoCliente']) : null;
$precioArticulo = isset($_GET['precioArticulo']) ? floatval($_GET['precioArticulo']) : null;

if ($nombreCliente !== null && $tipoCliente !== null && $precioArticulo !== null) {
    define('DESCUENTO_TIPO_1', 0.30);
    define('DESCUENTO_TIPO_2', 0.20);
    define('DESCUENTO_TIPO_3', 0.10);

    $descuento = 0;

    if ($tipoCliente == 1) {
        $descuento = $precioArticulo * DESCUENTO_TIPO_1;
    } elseif ($tipoCliente == 2) {
        $descuento = $precioArticulo * DESCUENTO_TIPO_2;
    } elseif ($tipoCliente == 3) {
        $descuento = $precioArticulo * DESCUENTO_TIPO_3;
    }


    $precioFinal = $precioArticulo - $descuento;
    $precioFinal = round($precioFinal, 2);
    echo "<strong>Cliente:</strong> " . $nombreCliente;
    echo "<br><strong>Precio Original:</strong> $" . $precioArticulo;
    echo "<br><strong>Descuento:</strong> $" . round($descuento, 2);
    echo "<br><strong>Precio Final:</strong> $" . $precioFinal;
    echo "<br>";
}
?>
    <!-- Problema 4: Cálculo de Signo Zodiacal -->
<br><strong>Problema 4: Calculadora de Signo Zodiacal</strong>
<br>
<form action="Laboratorio5.php" method="get">
    <label for="mesCumpleanos">Mes de Cumpleaños(número del mes):</label>
    <input type="number" id="mesCumpleanos" name="mesCumpleanos" required>
    <br>
    <label for="diaCumpleanos">Día de Cumpleaños:</label>
    <input type="number" id="diaCumpleanos" name="diaCumpleanos" required>
    <br>
    <input type="submit" class="btn btn-primary" value="Calcular Signo Zodiacal">
</form>
</body>
</html>
<?php
$mesCumpleanos = isset($_GET['mesCumpleanos']) ? intval($_GET['mesCumpleanos']) : null;
$diaCumpleanos = isset($_GET['diaCumpleanos']) ? intval($_GET['diaCumpleanos']) : null;

if ($mesCumpleanos !== null && $diaCumpleanos !== null) {
    $signo = '';
    switch ($mesCumpleanos) {
        case 1:
            if ($diaCumpleanos <= 20) {
                $signo = 'Capricornio';
            } else {
                $signo = 'Acuario';
            }
            break;
        case 2:
            if ($diaCumpleanos <= 19) {
                $signo = 'Acuario';
            } else {
                $signo = 'Piscis';
            }
            break;
        case 3:
            if ($diaCumpleanos <= 20) {
                $signo = 'Piscis';
            } else {
                $signo = 'Aries';
            }
            break;
        case 4:
            if ($diaCumpleanos <= 20) {
                $signo = 'Aries';
            } else {
                $signo = 'Tauro';
            }
            break;
        case 5:
            if ($diaCumpleanos <= 21) {
                $signo = 'Tauro';
            } else {
                $signo = 'Géminis';
            }
            break;
        case 6:
            if ($diaCumpleanos <= 21) {
                $signo = 'Géminis';
            } else {
                $signo = 'Cáncer';
            }
            break;
        case 7:
            if ($diaCumpleanos <= 23) {
                $signo = 'Cáncer';
            } else {
                $signo = 'Leo';
            }
            break;
        case 8:
            if ($diaCumpleanos <= 23) {
                $signo = 'Leo';
            } else {
                $signo = 'Virgo';
            }
            break;
        case 9:
            if ($diaCumpleanos <= 23) {
                $signo = 'Virgo';
            } else {
                $signo = 'Libra';
            }
            break;
        case 10:
            if ($diaCumpleanos <= 23) {
                $signo = 'Libra';
            } else {
                $signo = 'Escorpio';
            }
            break;
        case 11:
            if ($diaCumpleanos <= 22) {
                $signo = 'Escorpio';
            } else {
                $signo = 'Sagitario';
            }
            break;
        case 12:
            if ($diaCumpleanos <= 21) {
                $signo = 'Sagitario';
            } else {
                $signo = 'Capricornio';
            }
            break;
        default:
            $signo = 'Fecha inválida';
            break;
    }

    echo "<br><strong>Signo Zodiacal:</strong> " . $signo;
    echo "<br>";
}
?>
    <!-- Problema 5: Cálculo de IMC -->
    <br><strong>Problema 5: Calculadora IMC</strong>
    <form action="Laboratorio5.php" method="get">
        <br><label>Peso (kilogramos):</label>
        <input type="number" name="peso" step="0.01" required><br>
        <label>Altura (metros):</label>
        <input type="number" name="altura" step="0.01" required><br>
        <input type="submit" value="Calcular IMC">
    </form>

    <?php
if (isset($_GET['peso']) && isset($_GET['altura'])) {
    $peso = floatval($_GET['peso']);
    $altura = floatval($_GET['altura']);
    $imc = $peso / ($altura * $altura);

    echo "Tu IMC es: " . number_format($imc, 2);

    if ($imc < 18.5) {
        echo "<br>Estás bajo de peso.";
    } elseif ($imc < 24.9) {
        echo "<br>Tienes un peso saludable.";
    } elseif ($imc < 29.9) {
        echo "<br>Tienes sobrepeso.";
    } else {
        echo "<br>Tienes obesidad.";
    }
}
?>
    <!-- Problema 6: Cálculo de Múltiplos -->
     <br>
    <strong>Problema 6: Cálculo de Múltiplos</strong>
    <form action="Laboratorio5.php" method="get">
        <label for="rangoInferior">Rango Inferior:</label>
        <input type="number" id="rangoInferior" name="rangoInferior" required>
        <br>
        <label for="rangoSuperior">Rango Superior:</label>
        <input type="number" id="rangoSuperior" name="rangoSuperior" required>
        <br>
        <input type="submit" value="Calcular Múltiplos">
    </form>
    <?php
    $rangoInferior = isset($_GET['rangoInferior']) ? intval($_GET['rangoInferior']) : null;
    $rangoSuperior = isset($_GET['rangoSuperior']) ? intval($_GET['rangoSuperior']) : null;
   
    if ($rangoInferior !== null && $rangoSuperior !== null) {
        $cantidadMultiplos = 0;
   
        for ($i = $rangoInferior; $i <= $rangoSuperior; $i++) {
            if ($i % 3 == 0 || $i % 5 == 0) {
                $cantidadMultiplos++;
            }
        }
   
        echo "La cantidad de números múltiplos de 3 o 5 en el rango de $rangoInferior a $rangoSuperior es: $cantidadMultiplos";
        echo "<br>";
    }
    ?>
  <!-- Problema 7: Tabla de Números del 1 al 100 -->
    <br>
    <strong>Problema 7: Tabla de Números del 1 al 100</strong>
    <table border="1">
        <tr>
            <th>Número</th>
        </tr>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            echo "<tr><td>$i</td></tr>";
        }
        ?>
    </table>
    
    <!-- Problema 8: Suma de Números Posteriores -->
    <br>
    <strong>Problema 8: Suma de Números Posteriores</strong>
    <form action="Laboratorio5.php" method="get">
        <label for="numeroIngresado">Ingrese un número:</label>
        <input type="number" id="numeroIngresado" name="numeroIngresado" required>
        <br>
        <input type="submit" value="Calcular Suma de Números Posteriores">
    </form>
    
    <?php
    $numeroIngresado = isset($_GET['numeroIngresado']) ? intval($_GET['numeroIngresado']) : null;
    
    if ($numeroIngresado !== null) {
        $suma = 0;
        for ($i = $numeroIngresado + 1; $i <= $numeroIngresado + 10; $i++) {
            $suma += $i;
        }
    
        echo "La suma de los 10 números posteriores a $numeroIngresado es: $suma";
    }
    ?>

    <!-- Problema 9: Tabla de Multiplicar -->
    <br>
    <strong>Problema 9: Tabla de Multiplicar</strong>
    <form action="Laboratorio5.php" method="get">
        <label for="numeroTabla">Ingrese un número:</label>
        <input type="number" id="numeroTabla" name="numeroTabla" required>
        <br>
        <input type="submit" value="Mostrar Tabla de Multiplicar">
    </form>
    
    <?php
    $numeroTabla = isset($_GET['numeroTabla']) ? intval($_GET['numeroTabla']) : null;
    
    if ($numeroTabla !== null) {
        echo "Tabla de multiplicar del número $numeroTabla:";
        echo "<br>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numeroTabla * $i;
            echo "$numeroTabla x $i = $resultado<br>";
        }
    }
    ?>

    <!-- Problema 10: Cálculo de Factorial -->
    <br>
    <strong>Problema 10: Cálculo de Factorial</strong>
    <form action="Laboratorio5.php" method="get">
        <label for="numeroFactorial">Ingrese un número:</label>
        <input type="number" id="numeroFactorial" name="numeroFactorial" required>
        <br>
        <input type="submit" value="Calcular Factorial">
    </form>
    
    <?php
    $numeroFactorial = isset($_GET['numeroFactorial']) ? intval($_GET['numeroFactorial']) : null;
    
    if ($numeroFactorial !== null) {
        $factorial = 1;
        for ($i = 1; $i <= $numeroFactorial; $i++) {
            $factorial *= $i;
        }
    
        echo "El factorial de $numeroFactorial es: $factorial";
    }
    ?>
</body>
</html>