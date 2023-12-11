<?php
/*
Andrés Trelles 8-971-969
Grupo: 1SF133
Laboratorio 6, Ingeniería Web
*/
// Pregunta 2
echo "<strong> PREGUNTA 2 </strong>";
echo "<p>Nombre: <strong>Andrés</strong></p>";
echo "Apellido: <strong>Trelles</strong></p>";
echo "Cédula: <strong>8-971-969</strong></p>";
echo "Correo electrónico: <strong>andres.trelles@utp.ac.pa</strong></p>";
echo "Carrera: <strong>Licenciatura en Ingeniería de Software</strong></p>";

// Pregunta 3
echo "<br>";
echo "<p><strong> PREGUNTA 3 </strong><p>";
$a = 4;
$b = 2;
$c = 3;
$d = 5;

echo "La suma de 2+4 es: <strong>" . ($a + $b) . "</strong>";
echo "<p>La resta de 5-3 es: <strong>" . ($d - $c) . "</strong></p>";
echo "<p>La multiplicación de 4*2*3*5 es: <strong>" . ($a * $b * $c * $d) . "</strong></p>";
echo "<p>La división de 4/2 es: <strong>" . ($a / $b) . "</strong></p>";

// Pregunta 4
echo "<br>";
echo "<p><strong> PREGUNTA 4 </strong><p>";
echo "El valor de la variable 1 es: <strong> 5 </strong> ";
$variable1 = 5;
echo "<p>El valor de la variable 2 es:<strong> 10 </strong>";
$variable2 = 10;
echo "<p>El valor de la variable 3 es: <strong> 15 </strong> ";
$variable3 = 15;
echo "<p>El valor de la variable 4 es:<strong> 15 </strong>";
$variable4 = 15;

if ($variable1 == $variable2) {
    echo "<p> La variable 1 y la variable 2 son iguales";
} elseif ($variable1 > $variable2) {
    echo "<p> La variable 1 es mayor a la variable 2";
} else {
    echo "<p> La variable 1 es menor a la variable 2";
}
if ($variable1 != $variable2) {
    echo "<p> La variable 1 y la variable 2 no son iguales";
}

if ($variable3 == $variable4) {
    echo "<p> La variable 3 y la variable 4 son iguales";
} elseif ($variable3 > $variable4) {
    echo "<p> La variable 3 es mayor a la variable 4";
} else {
    echo "<p> La variable 3 es menor a la variable 4";
}

if ($variable1 <= $variable2) {
    echo "<p> La variable 1 es menor o igual a la variable 2";
}

if ($variable1 >= $variable2) {
    echo "<p> La variable 1 es mayor o igual a la variable 2";
}

// Pregunta 5
echo "<br>";
echo "<br>";
echo "<p><strong> PREGUNTA 5 </strong><p>";
define("NOMBRE", "Andrés");
define("EDAD", "22");

echo "<p> Hola, mi nombre es " . NOMBRE . "<p>";
echo "Tengo " . EDAD . " años <p>";

$concatenar = "Hola, mi nombre es " . NOMBRE . ", tengo " . EDAD . " años";
echo $concatenar;
?>
