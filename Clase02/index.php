<?php

include "funciones.php";

echo "Esto si se esta ejecutando a pesar de que no existe el archivo";
echo "<br/>";

//Funcion Suma
$suma1 = sumar(5,9);
echo $suma1;
echo "<br/>";

//Funcion Calcular sueldo
$sueldoJuan = calcularSueldoSemanal(5,20);

echo "El sueldo de juan es: " . $sueldoJuan;

