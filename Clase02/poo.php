<?php

require_once "Persona.php";

//Creando un objeto
$cristian = new Persona();
$cristian->nombres = "cristian";
$cristian->apellido_paterno = "chunga";
$cristian->apellido_materno = "chunga";

echo $cristian->nombreCompleto();
echo $cristian->montoVenta(100);


$luismiguel = new Persona();
$luismiguel->nombres = "luis miguel";
$luismiguel->apellido_paterno = "condori";
$luismiguel->apellido_materno = "lopez";


$vanessa = new Persona();
$vanessa->nombres = "vanesa";
$vanessa->apellido_paterno = "orellana";
$vanessa->apellido_materno = "rios";
