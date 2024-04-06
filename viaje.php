<?php

/**
 * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
 * De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
*/

class Viaje{
    private $destino;
    private $cant_max_pasajeros;
    private $pasajerosTotal;

    //Metodo __construct
    public function __construct($destino, $cant_max_pasajeros, $pasajerosTotal)
    {
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
        $this->pasajerosTotal = $pasajerosTotal;
    }

    //Metodos de acceso de Destino
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }

    //Cantidad Maxima de pasajeros
    public function getCantMax(){
        return $this->cant_max_pasajeros;
    }
    public function setCantMax($cant_max_pasajeros){
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    //Pasajeros del Viaje
    public function getPasViaje(){
        return $this->pasajerosTotal;
    }
    public function setPasViaje($pasajerosTotal){
        $this->pasajerosTotal = $pasajerosTotal;
    }

    //Metodo __toString para reflejar informacion del viaje
    public function __toString()
    {
        return "Lugar de Destino: ". $this->getDestino(). "\n" . 
                "Cantidad Maxima de pasajeros: ". $this->getCantMax() . "\n". 
                "Pasajeros a bordo: ". $this->getPasViaje() . "\n"; 
    }
}

