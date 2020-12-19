<?php

class Carro {
    public $color;
    public $numercoLlantas;
    public $colorLunas;
    public $velocidadMaxima;

    public function arrancar(){
        return "Auto con placa ".$this->placa . " ha arracado";
    }

    public function acelerar(){
        return "Auto con placa ".$this->placa . " ha acelerado";
    }

    public function detener(){
        return "Auto con placa ".$this->placa . " se ha detenido";
    }
}