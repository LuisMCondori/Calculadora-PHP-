<?php


//Definicion de una funcion

function sumar($numero1, $numero2)
{
    $suma = $numero1 + $numero2;
    return $suma;
}

/**
 * Esta funcion para calular suledo semanal
 */
function calcularSueldoSemanal($diasTrabajados, $costoHora)
{
    $sueldoSemanal = 8 * $diasTrabajados *  $costoHora;
    return $sueldoSemanal;
}