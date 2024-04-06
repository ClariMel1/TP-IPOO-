<?php

/**
 * Implementar un script testViaje.php que cree una instancia de la clase Viaje y 
 * presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
*/

include 'viaje.php';
include 'pasajeros.php';

$objPasajeros = array(
    new Pasajeros("Diana", "Mendez", "92456978", "299576234"),
    new Pasajeros("Lucia", "Lazuli", "46089657","299873456" ),
    new Pasajeros("Pedro", "Leron", "92378564", "299334897")
);

$objViaje = new Viaje("Bariloche", 8, $objPasajeros);

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
            echo "Ingrese Destino del viaje:";
            $destino = trim(fgets(STDIN));
            echo "Ingrese Cantidad Maxima de pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje->cambiarDestino($destino);
            $objViaje->cambiarMaxPasajeros($cantMax);
            echo $objViaje;
            break;
        case '6':
            echo $objViaje;
            break;
    }
}while($opcion !=7);
