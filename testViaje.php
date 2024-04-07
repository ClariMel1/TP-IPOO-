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

$objResponsable = new ResponsableV("15608957", "19", "Jorge", "Elizalde");

$objViaje = new Viaje(45, "Bariloche", 4, $objPasajeros, $objResponsable);

echo "EMPRESA TRANSPORTE <<<VIAJE FELIZ>>>". "\n";
echo "1.Modificar Datos del Viaje.". "\n";
echo "3.Modificar Informacion sobre pasajeros.". "\n";
echo "4.Agregar pasajeros.". "\n";
echo "5.Responsable del Viaje.". "\n";
echo "6.Cargar Informacion del Viaje.". "\n";
echo "7.Salir". "\n";

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
            echo $objViaje;
            break;
        case '2':
            # code...
            break;
        case '3':
            # code...
            break;
        case '4':
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
                $objViaje->agregarDatosPasajero($numeroTel, $numeroDoc, $nombrePas, $apellidoPas);
            }else{
                echo "El cupo de pasajeros por viaje ya esta completo.". "\n";
            }
            break;
        case '5':
            echo "Ingrese nombre del Responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido:";
            $apellido = trim(fgets(STDIN));
            echo "Numero del responsable:";
            $num = trim(fgets(STDIN));
            echo "Numero de Licencia:";
            $numLic = trim(fgets(STDIN));
            $objViaje->agregarDatosEmpleado($num, $numLic, $nombre, $apellido);
            break;
        case '6':
            echo "\n";
            echo $objViaje . "\n";
            break;
    }
}while($opcion !=7);
