<?php

require_once "Carro.php";
//Creando objeto
$ferrari = new Carro();
//Definiendo atributo
$ferrari->placa = "AER-123";

//Llamamos al metodo arrancar
echo $ferrari->arrancar();
echo "</br>";
//Llamamos al metodo acelerar
echo $ferrari->acelerar();