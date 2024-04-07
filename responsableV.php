<?php

/**
 * También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV
 * que registre el número de empleado, número de licencia, nombre y apellido.
 * La clase Viaje debe hacer referencia al responsable de realizar el viaje.
*/

class ResponsableV {
    private $numEmpleado;
    private $numLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

    //Metodo __construct
    public function __construct($numEmpleado, $numLicencia, $nombreEmpleado, $apellidoEmpleado)
    {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->apellidoEmpleado = $apellidoEmpleado;
    }

    //Metodo de acceso Numero de empleado
    public function getNumEmp(){
        return $this->numEmpleado;
    }
    public function setNumEmp($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    //Numero de Licencia 
    public function getNumLic(){
        return $this->numLicencia;
    }
    public function setNumLic($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    //Nombre del empleado
    public function getNomEmp(){
        return $this->nombreEmpleado;
    }
    public function setNomEmp($nombreEmpleado){
        $this->nombreEmpleado = $nombreEmpleado;
    }

    //Apellido del empleado
    public function getApeEmp(){
        return $this->apellidoEmpleado;
    }
    public function setApeEmp($apellidoEmpleado){
        $this->apellidoEmpleado = $apellidoEmpleado;
    }

    //Metodo __toString para mostrar informacion del empleado.
    public function __toString()
    {
        return "Responsable: ". $this->getNomEmp() . " " . $this->getApeEmp() . "\n" . 
                "Numero del Responsable: ". $this->getNumEmp() . "\n" . 
                "Numero de Licencia: ". $this->getNumLic(). "\n";
    }
}