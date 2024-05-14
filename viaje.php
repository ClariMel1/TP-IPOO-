<?php

/**ENUCIADO 1
 * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
 * De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
 * Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase
 * (incluso los datos de los pasajeros).
*/
/*ENUNCIADO 2
 * Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e 
 * implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros
 *( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado 
 * por el pasajero.
*/
class Viaje {
    private $codigo_viaje;
    private $destino;
    private $costoViaje; //agregue
    private $cant_max_pasajeros;
    private $objPasajeros;
    private $objResponsable;

    //Metodo __construct
    public function __construct($codigo_viaje, $destino, $costoViaje, $cant_max_pasajeros, $objPasajeros, $objResponsable)
    {
        $this->codigo_viaje = $codigo_viaje;
        $this->destino = $destino;
        $this->costoViaje = $costoViaje;
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

    //Costo del Viaje
    public function getCosto(){
        return $this->costoViaje;
    }
    public function setCosto($costoViaje){
        $this->costoViaje = $costoViaje;
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
                "Costo del Viaje: ". $this->getCosto(). "\n".  
                "Cantidad Maxima de pasajeros: ". $this->getCantMax() . "\n".
                "Viaje a cargo del " . $this->getResponsable(). "\n". 
                "Pasajeros a bordo: ". "\n" . 
                $this->recorrerArrayPasajeros(). "\n". 
                "Suma de costo abonados: ". $this->sumaCostos(). "\n";
    }

    //Cambiar atributos de la clase Viaje
    public function cambiarCodigo ($nuevoCodigo){
        return $this->setCodigo($nuevoCodigo);
    }
    public function cambiarDestino($nuevoDestino){
        return $this->setDestino($nuevoDestino);
    }
    public function cambiarCosto($nuevoCosto){
        return $this->setCosto($nuevoCosto);
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

    /** ENUNCIADO 2
     * Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es
     *  menor a la cantidad máxima de pasajeros y falso caso contrario
    */
    //Chequea que no se haya llenado el cupo de pasajeros por viaje
    public function hayPasajeDisponible(){
        $maximo = $this->getCantMax();
        if (count($this->objPasajeros) < $maximo){
            $bandera = true;
        }else{
            $bandera = false;
        }
        return $bandera;
    }

    //Suma los costos dentro de un arreglo de pasajeros para obtner el costo final
    public function sumaCostos(){
        $pasajeros = $this->objPasajeros;
        $suma = 0;
        $precio = $this->getCosto();

        for ($i=0; $i < count($pasajeros); $i++){
            $pasajero = $pasajeros[$i];
            $incremento = $pasajero->darPorcentajeIncremento();
            $precioConIncremento = $precio + ($precio * ($incremento / 100));
            $suma = $suma + $precioConIncremento;
        }
        return $suma;
    }

    /** ENUNCIADO 2
     *Implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros 
     * ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado
     *  por el pasajero.
    */
    public function venderPasaje ($objPasajero){
        $disponibilidad = $this->hayPasajeDisponible();

        if($disponibilidad){
            $this->objPasajeros[]= $objPasajero;
            $costoFinal = $this->sumaCostos();
        }else{
            $costoFinal = -1;
            // Indica que no hay disponibilidad de pasajes.
        }

        return $costoFinal;
    }

    //Chequea o verifica que el pasajero no este cargado mas de una vez en el viaje
    public function checkPasajeroRepetido($dni){
        $listaPasajeros = $this->getPasajeros();
        $repetido = false;

        foreach ($listaPasajeros as $pasajero){
            if($pasajero->getNumDoc() == $dni){
                $repetido = true;
            }
        }

        return $repetido;
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

    //Para agregar datos del Responsable
    public function agregarDatosEmpleado($numero, $numeroLic, $nombre, $apellido){
        $agregarEmpleado = new ResponsableV($numero, $numeroLic, $nombre, $apellido);
        return $this->setResponsable($agregarEmpleado);
    }
}

