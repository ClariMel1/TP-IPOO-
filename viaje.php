<?php

/**
 * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
 * De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
*/

/**
 * Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase
 *  (incluso los datos de los pasajeros).
*/

class Viaje {
    private $destino;
    private $cant_max_pasajeros;
    private $objPasajeros;

    //Metodo __construct
    public function __construct($destino, $cant_max_pasajeros, $objPasajeros)
    {
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
        $this->objPasajeros = $objPasajeros;
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
    public function getPasajeros(){
        return $this->objPasajeros;
    }
    public function setPasajeros($objPasajeros){
        $this->objPasajeros = $objPasajeros;
    }

    //Metodo __toString para reflejar informacion del viaje
    public function __toString()
    {
        return "Lugar de Destino: ". $this->getDestino(). "\n" . 
                "Cantidad Maxima de pasajeros: ". $this->getCantMax() . "\n". 
                "Pasajeros a bordo: ". print_r($this->getPasajeros()). "\n"; 
    }

    //Cambiar atributos de la clase Viaje
    public function cambiarDestino($nuevoDestino){
        return $this->setDestino($nuevoDestino);
    }
    public function cambiarMaxPasajeros($nuevoMaxPasajeros){
        return $this->setCantMax($nuevoMaxPasajeros);
    }
    public function cambiarPasajero($nuevoPasajero){
        return $this->setPasajeros($nuevoPasajero);
    }

}

