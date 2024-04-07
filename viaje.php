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
    private $codigo_viaje;
    private $destino;
    private $cant_max_pasajeros;
    private $objPasajeros;
    private $objResponsable;

    //Metodo __construct
    public function __construct($codigo_viaje, $destino, $cant_max_pasajeros, $objPasajeros, $objResponsable)
    {
        $this->codigo_viaje = $codigo_viaje;
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
        $this->objPasajeros = $objPasajeros;
        $this->objResponsable = $objResponsable;
    }

    //Metodos de acceso de Codigo de Viaje
    public function getCodigo(){
        return $this->codigo_viaje;
    } 
    public function setCodigo($codigo_viaje){
        $this->codigo_viaje = $codigo_viaje;
    }

    //Destino
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

    //Responsable del viaje 
    public function getResponsable(){
        return $this->objResponsable;
    }
    public function setResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    //Metodo para recorrer el array de Pasajeros 
    public function recorrerArrayPasajeros() {
        $mostrar = "";
        if(count($this->getPasajeros()) == null){
            $mostrar = 0;
        }else{
            $arregloPasajeros = $this->getPasajeros();
            foreach ($arregloPasajeros as $pasajero) {
                $mostrar .= $pasajero . "\n";
            }
        }
        return $mostrar;
    }

    //Metodo __toString para reflejar informacion del viaje
    public function __toString()
    {
        return "Codigo de Viaje: ". $this->getCodigo(). "\n" . 
                "Lugar de Destino: ". $this->getDestino(). "\n" . 
                "Cantidad Maxima de pasajeros: ". $this->getCantMax() . "\n".
                "Viaje a cargo del " . $this->getResponsable(). "\n". 
                "Pasajeros a bordo: ". "\n" . 
                $this->recorrerArrayPasajeros();
    }

    //Cambiar atributos de la clase Viaje
    public function cambiarCodigo ($nuevoCodigo){
        return $this->setCodigo($nuevoCodigo);
    }
    public function cambiarDestino($nuevoDestino){
        return $this->setDestino($nuevoDestino);
    }
    public function cambiarMaxPasajeros($nuevoMaxPasajeros){
        return $this->setCantMax($nuevoMaxPasajeros);
    }
    public function cambiarPasajero($nuevoPasajero){
        return $this->setPasajeros($nuevoPasajero);
    }

    //Setear el arreglo de pasajeros
    public function quitarPasajeros(){
        $this->objPasajeros = [];
        $arregloVacio = $this->objPasajeros;
        return $this->setPasajeros($arregloVacio);
    }
    //Setear informacion del Responsable
    public function quitarResponsable(){
        return $this->setResponsable(0);
    }

    //Verifica que el Indice de pasajero exista dentro de la lista
    public function checkPasajero($i){
        $pasajerosLista = $this->getPasajeros();
        if($i >= 0 && $i < count($pasajerosLista)){
            $bandera = true;
        }else{
            $bandera = false;
        }
        return $bandera;
    }
    //Cambiar atributos de un pasajero
    public function cambiarDatosPasajero($i, $nombre, $apellido, $numDoc, $telefono){
        $pasajerosLista = $this->getPasajeros();
        if($i >= 0 && $i < count($pasajerosLista)){

            $pasajero = $pasajerosLista[$i];
            $pasajero->setNombre($nombre);
            $pasajero->setApelLido($apellido);
            $pasajero->setNumDoc($numDoc);
            $pasajero->setTelefono($telefono);
            return $this->cambiarPasajero($pasajerosLista);
        }
    }

    //Para agregar datos de un Pasajero
    public function agregarDatosPasajero($nombre, $apellido, $numDoc, $telefono){
        $agregarPasajero = new Pasajeros($nombre, $apellido, $numDoc, $telefono);
        return array_push($this->objPasajeros, $agregarPasajero);
    }

    //Para agregar datos del Responsable
    public function agregarDatosEmpleado($numero, $numeroLic, $nombre, $apellido){
        $agregarEmpleado = new ResponsableV($numero, $numeroLic, $nombre, $apellido);
        return $this->setResponsable($agregarEmpleado);
    }

    //Chequea que no se haya llenado el cupo de pasajeros por viaje
    public function checkCupoViaje(){
        $maximo = $this->getCantMax();
        if (count($this->objPasajeros) < $maximo){
            $bandera = true;
        }else{
            $bandera = false;
        }
        return $bandera;
    }

}

