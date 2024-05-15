<?php

//La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.

class PasajeroVip extends Pasajero {
    private $num_frecuencia;
    private $cant_millas;

    // Constructor
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $num_asiento, $num_ticket, $num_frecuencia, $cant_millas) {
        parent::__construct($nombre, $apellido, $numDocumento, $telefono, $num_asiento, $num_ticket);
        $this->num_frecuencia = $num_frecuencia;
        $this->cant_millas = $cant_millas;
    }

    // Numero de Frecuencia
    public function getNumFrecuencia() {
        return $this->num_frecuencia;
    }                                       
    public function setNumFrecuencia($num_frecuencia) {
        $this->num_frecuencia = $num_frecuencia;
    }

    //Cantidad de millas
    public function getCantMillas() {
        return $this->cant_millas;
    }
    public function setCantMillas($cant_millas) {
        $this->cant_millas = $cant_millas;
    }

    // Método para representar el objeto como una cadena
    public function __toString() {
        $mostrar = parent::__toString();
        $mostrar = $mostrar . "Número de Frecuencia: " . $this->getNumFrecuencia() . "\nMillas: " . $this->getCantMillas(). "\n";
        return $mostrar;
    }

    //Metodo para calcular el porcentaje de incremento del Pasajero VIP 
    public function darPorcentajeIncremento() {
        if ($this->getCantMillas() > 300) {
            $porcentajeInc = 30;
        }else{
            $porcentajeInc = 35 ;
        }
        return $porcentajeInc;
    }

    
}

?>