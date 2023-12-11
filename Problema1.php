<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio 5</title>
</head>
<body>
    <h1>Laboratorio 5</h1>
    <br> Estudiante: <strong> Andrés Trelles </strong>
    <br>Cédula: <strong> 8-971-969 </strong>
    <br>
    <br> <strong>Laboratorio de PHP</strong>
    <br><strong>Problema 1:</strong> 
    <br>Realice un programa que calcule el sueldo que le corresponde al trabajador de una empresa que cobra $40.000 anuales, el programa debe realizar los cálculos en función de los siguientes criterios: 
    <br> <strong>a</strong>. Si lleva más de 10 años en la empresa se le aplica un aumento del 10%. 
    <br><strong>b</strong>. Si lleva menos de 10 años pero más que 5 se le aplica un aumento del 7%. 
    <br><strong>c</strong>. Si lleva menos de 5 años pero más que 3 se le aplica un aumento del 5%. 
    <br><strong>d</strong>. Si lleva menos de 3 años se le aplica un aumento del 3%.
    <br>
    <br>
    <form action="Problema5.php" method="get">
        <label for="aniosEmpresa">Años en la empresa:</label>
        <input type="number" id="aniosEmpresa" name="aniosEmpresa" required>
        <br>
        <input type="submit" value="Calcular Sueldo">
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
    }
    ?>


<br><strong>Problema 2:</strong>
    <br>Cree un programa que permita calcular el salario semanal de unos empleados a los que se les paga $15 por hora si éstas no superan las 35 horas. Cada hora por encima de 35 se considerará extra y se paga a $22. El programa debe pedir las horas trabajadas por el trabajador y devolver el salario que se le debe pagar.
    <br>
    <form action="Laboratorio5.php" method="get">
        <label for="horasTrabajadas">Horas Trabajadas por usted:</label>
        <input type="number" id="aniosEmpresa" name="aniosEmpresa" required>
        <br>
        <input type="submit" value="Calcular Sueldo">
    </form>
</body>
</html>
<?php 
    $horasTrabajadas = isset($_GET[''])
