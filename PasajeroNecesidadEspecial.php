<?php 

//La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales 
//como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias 
// o restricciones alimentarias.

class PasajeroNecesidadEspecial extends Pasajero {
    private $servicios_especiales;

    // Constructor
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $num_asiento, $num_ticket, $servicios_especiales) {
        parent::__construct($nombre, $apellido, $numDocumento, $telefono, $num_asiento, $num_ticket);
        $this->servicios_especiales = $servicios_especiales;
    }

    // Método para obtener los servicios especiales
    public function getServiciosEspeciales() {
        return $this->servicios_especiales;
    }
    // Método para establecer los servicios especiales
    public function setServiciosEspeciales($servicios_especiales) {
        $this->servicios_especiales = $servicios_especiales;
    }

    // Método para representar el objeto como una cadena
    public function __toString() {
        $mostrar = parent::__toString();
        $mostrar = $mostrar.  "Servicios Especiales: " . $this->getServiciosEspeciales(). "\n";
        return $mostrar;
    }
}

?>