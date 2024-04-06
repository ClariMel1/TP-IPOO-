<?php

/**
 * Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros.
 * Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
*/

class Pasajeros{
    private $nombre;
    private $apellido;
    private $numDocumento;

    //Metodo __construct
    public function __construct($nombre, $apellido, $numDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
    }

    //Metodos de acceso Nombre
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //Apellido
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //Numero de Documento
    public function getNumDoc(){
        return $this->numDocumento;
    }
    public function setNumDoc ($numDocumento){
        $this->numDocumento = $numDocumento;
    }

    //Metodo __toString para mostrar la informacion de los pasajeros
    public function __toString()
    {
        return "Pasajero: ". $this->getNombre() . "\n". 
                "Apellido: ". $this->getApellido() . "\n". 
                "Numero de Documento: ". $this->getNumDoc() . "\n";
    }
}