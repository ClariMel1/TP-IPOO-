<?php

/**
 * Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros.
 * Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
*/

//La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje.

class Pasajero{
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;
    private $num_asiento;
    private $num_ticket;

    //Metodo __construct
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $num_asiento, $num_ticket)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
        $this->telefono = $telefono;
        $this->num_asiento = $num_asiento;
        $this->num_ticket = $num_ticket;
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

    //Telefono del Pasajero
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    //Numero de Asiento 
    public function getNumAsiento() {
        return $this->num_asiento;
    }
    public function setNumAsiento($num_asiento) {
        $this->num_asiento = $num_asiento;
    }

    //Numero de Ticket
    public function getNumTicket() {
        return $this->num_ticket;
    }
    public function setNumTicket($num_ticket) {
        $this->num_ticket = $num_ticket;
    }

    //Metodo __toString para mostrar la informacion de los pasajeros
    public function __toString()
    {
        return "Pasajero: ". $this->getNombre() ." ". $this->getApellido() . "\n". 
                "Numero de Documento: ". $this->getNumDoc() . "\n". 
                "Telefono: ". $this->getTelefono(). "\n".
                "Asiento: " . $this->getNumAsiento() ."   ". "Ticket: " . $this->getNumTicket().  "\n";
    }

    /**Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según
     *  las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas
     *  acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y
     *  requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo
     *  requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes 
     * el porcentaje de incremento es del 10 % 
    */
    public function darPorcentajeIncremento() {
        $porcentajeInc = 10;
        return $porcentajeInc;
    }
}