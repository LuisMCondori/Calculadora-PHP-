<?php

//definir clase
class Persona
{
    //definir atributos
    public $nombres;
    public $apellido_materno;
    public $apellido_paterno;

    protected $igv = 18;

    //definir metodos
    public function nombreCompleto()
    {
        return $this->nombres . " " . $this->apellido_paterno . ' ' .$this->apellido_materno;
    }

    /**
     * Se usa el this porue este es un cuerpo diferemte
     */
    public function montoVenta($costo)
    {
        return $costo * ($this->igv / 100);
    }
}