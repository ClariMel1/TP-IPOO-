<?php

/**
 * Implementar un script testViaje.php que cree una instancia de la clase Viaje y 
 * presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
*/

include 'viaje.php';
include 'pasajeros.php';
include 'responsableV.php';

$objPasajeros = array(
    new Pasajeros("Diana", "Mendez", "92456978", "299576234"),
    new Pasajeros("Lucia", "Lazuli", "46089657","299873456" ),
    new Pasajeros("Pedro", "Leron", "92378564", "299334897")
);

$objResponsable = new ResponsableV("13", "4938", "Jorge", "Elizalde");

$objViaje = new Viaje(3888, "Bariloche", 4, $objPasajeros, $objResponsable);



echo "****************************************". "\n";
echo "EMPRESA DE TRANSPORTE <<<VIAJE FELIZ>>>". "\n";
echo "****************************************". "\n";
echo "1.Modificar Datos del Viaje.". "\n";
echo "2.Modificar Informacion sobre pasajeros.". "\n";
echo "3.Agregar pasajeros.". "\n";
echo "4.Responsable del Viaje.". "\n";
echo "5.Cargar Informacion del Viaje.". "\n";
echo "6.Salir". "\n";

do{
    echo "Ingrese su opcion:";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            echo "Ingrese codigo de Viaje:";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese Destino del viaje:";
            $destino = trim(fgets(STDIN));
            echo "Ingrese Cantidad Maxima de pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje->cambiarCodigo($codigo);
            $objViaje->cambiarDestino($destino);
            $objViaje->cambiarMaxPasajeros($cantMax);

            echo "Desea mantener los datos de pasajeros y del empleado responsable o anularlos?(s/n)";
            $respuesta = trim(fgets(STDIN));
            if($respuesta == "s"){
                $objViaje->quitarPasajeros();
                $objViaje->quitarResponsable();
            }
            echo "Cambio realizado con exito! :)". "\n";
            break;
        case '2':
            print_r($objViaje->getPasajeros());
            echo "Ingrese N° de Indice del pasajero a modificar:";
            $indice = trim(fgets(STDIN));
            $aviso = $objViaje->checkPasajero($indice);
            if($aviso == true){
                echo "Ingrese nombre del Pasajero: ";
                $nombrePas = trim(fgets(STDIN));
                echo "Apellido: "; 
                $apellidoPas = trim(fgets(STDIN));
                echo "Numero de documento: ";
                $numeroDoc = trim(fgets(STDIN));
                echo "Numero de telefono: ";
                $numeroTel = trim(fgets(STDIN));
                $repetido = $objViaje->checkPasajeroRepetido($numeroDoc);
                if($repetido == true){
                    echo "El pasajero que ingreso ya pertenecia en la lista de pasajeros.". "\n";
                }else{
                    $objViaje->cambiarDatosPasajero($indice, $nombrePas, $apellidoPas, $numeroDoc, $numeroTel);
                    echo "Cambio realizado con exito! :)". "\n";
                }
            }else{
                echo "Ese numero de pasajero no figura en la lista.". "\n";
            }
            break;
        case '3':
            $check = $objViaje->checkCupoViaje();
            if($check == true){
                echo "Ingrese nombre del Pasajero: ";
                $nombrePas = trim(fgets(STDIN));
                echo "Apellido: "; 
                $apellidoPas = trim(fgets(STDIN));
                echo "Numero de documento: ";
                $numeroDoc = trim(fgets(STDIN));
                echo "Numero de telefono: ";
                $numeroTel = trim(fgets(STDIN));
                $repetido = $objViaje->checkPasajeroRepetido($numeroDoc);
                if($repetido == true){
                    echo "El pasajero que ingreso ya pertenecia en la lista de pasajeros.". "\n";
                }else{
                    $objViaje->agregarDatosPasajero($nombrePas, $apellidoPas, $numeroTel, $numeroDoc);
                    echo "Datos agregados con exito! :)". "\n";
                }
            }else{
                echo "El cupo de pasajeros por viaje ya esta completo.". "\n";
            }
            break;
        case '4':
            echo "Ingrese nombre del Responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido:";
            $apellido = trim(fgets(STDIN));
            echo "Numero del responsable:";
            $num = trim(fgets(STDIN));
            echo "Numero de Licencia:";
            $numLic = trim(fgets(STDIN));
            $objViaje->agregarDatosEmpleado($num, $numLic, $nombre, $apellido);
            echo "Datos agregados con exito! :)". "\n";
            break;
        case '5':
            echo "\n";
            echo $objViaje . "\n";
            break;
    }
}while($opcion !=6);
