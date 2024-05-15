<?php

/**
 * Implementar un script testViaje.php que cree una instancia de la clase Viaje y 
 * presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
*/

include 'Viaje.php';
include 'Pasajero.php';
include 'PasajeroVip.php';
include 'PasajeroNecesidadEspecial.php';
include 'responsableV.php';

$objPasajero1 = new Pasajero ("Diana", "Mendez", "92456978", "299576234", 2, 1);
$objPasajero2 = new PasajeroVip ("Lucia", "Lazuli", "46089657","299873456", 3, 3, 5, 8000);
$objPasajero3 = new PasajeroNecesidadEspecial ("Pedro", "Leron", "92378564", "299334897", 4, 2, "Asistencia" );
$arregloPasajeros = [$objPasajero1, $objPasajero2, $objPasajero3];

$objResponsable = new ResponsableV("13", "4938", "Jorge", "Elizalde");

$objViaje = new Viaje(3888, "Bariloche", 2700, 4, $arregloPasajeros, $objResponsable, 0);

do{
    echo "****************************************". "\n";
    echo "EMPRESA DE TRANSPORTE <<<VIAJE FELIZ>>>". "\n";
    echo "****************************************". "\n";
    echo "1.Modificar Datos del Viaje.". "\n";
    echo "2.Vender Pasajes.". "\n";
    echo "3.Mostrar Informacion del Viaje.". "\n";
    echo "4.Salir". "\n";

    echo "Ingrese su opcion:";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            echo "**************************". "\n";
            echo "Eliga tipo de Modificacion". "\n";
            echo "**************************". "\n";
            echo "1.Modificar Viaje.". "\n";
            echo "2.Modificar Pasajeros.". "\n";
            echo "3.Modificar Responsable.". "\n";
            $modificacion = trim(fgets(STDIN));
            switch ($modificacion) {
                case 1:
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
                    if ($respuesta == "s") {
                        $objViaje->quitarPasajeros();
                        $objViaje->quitarResponsable();
                    } else {
                        echo "Cambio realizado con exito! :)" . "\n";
                    }
                    break;
            
                case 2:
                    print_r($objViaje->getPasajeros());
                    echo "Ingrese N° de Indice del pasajero a modificar:";
                    $indice = trim(fgets(STDIN));
                    $aviso = $objViaje->checkTipoPasajero($indice);
                    echo $aviso . "\n";
            
                    echo "Ingrese nombre del Pasajero: ";
                    $nombrePas = trim(fgets(STDIN));
                    echo "Apellido: ";
                    $apellidoPas = trim(fgets(STDIN));
                    echo "Numero de documento: ";
                    $numeroDoc = trim(fgets(STDIN));
                    $repetido = $objViaje->checkPasajeroRepetido($numeroDoc);
                    if ($repetido == true) {
                        echo "El pasajero que ingreso ya pertenecia en la lista de pasajeros." . "\n";
                    } else {
                        echo "Numero de telefono: ";
                        $numeroTel = trim(fgets(STDIN));
                        echo "Numero de Asiento: ";
                        $asiento = trim(fgets(STDIN));
                        echo "Numero de ticket: ";
                        $ticket = trim(fgets(STDIN));
                    }
                    if ($aviso == 1) {
                        echo "Numero de frecuencia: ";
                        $frecuencia = trim(fgets(STDIN));
                        echo "Millas: ";
                        $millas = trim(fgets(STDIN));
                        $modificacionLista = $objViaje->modificarPasajeroVip($indice, $nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket, $frecuencia, $millas);
                    } elseif ($aviso == 0) {
                        echo "**************************" . "\n";
                        echo "SERVICIOS DE OFRECIMIENTO" . "\n";
                        echo "**************************" . "\n";
                        echo "1.Silla de ruedas" . "\n";
                        echo "2.Asistencia" . "\n";
                        echo "3.Comida Especial" . "\n";
                        echo "4.TODAS" . "\n";
                        $servicio = trim(fgets(STDIN));
                        if ($servicio == 4) {
                            $servicio = "Silla de ruedas, asistencia y comida especial";
                        } elseif ($servicio == 3) {
                            $servicio = "Comida Especial";
                        } elseif ($servicio == 2) {
                            $servicio = "Asistencia";
                        } elseif ($servicio == 1) {
                            $servicio = "Silla de ruedas";
                        }
                        $modificacionLista = $objViaje->modificarPasajeroNesEsp($indice, $nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket, $servicio);
                    } else {
                        $modificacionLista = $objViaje->modificarPasajero($indice, $nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket);
                    }
                    break;
                case 3:
                    echo "Ingrese nombre del Responsable: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Apellido:";
                    $apellido = trim(fgets(STDIN));
                    echo "Numero del responsable:";
                    $num = trim(fgets(STDIN));
                    echo "Numero de Licencia:";
                    $numLic = trim(fgets(STDIN));
                    $objViaje->agregarDatosEmpleado($num, $numLic, $nombre, $apellido);
                    echo "Datos agregados con exito! :)" . "\n";
                    break;
                default:
                    echo "Opción no válida.";
                    break;
            }
            
            break;
        case '2':
            echo "Ingrese nombre del Pasajero: ";
            $nombrePas = trim(fgets(STDIN));
            echo "Apellido: "; 
            $apellidoPas = trim(fgets(STDIN));
            echo "Numero de documento: ";
            $numeroDoc = trim(fgets(STDIN));

            $repetido = $objViaje->checkPasajeroRepetido($numeroDoc);
            if($repetido == true){
                echo "El pasajero que ingreso ya pertenecia en la lista de pasajeros.". "\n";
            }else{
                echo "Numero de telefono: ";
                $numeroTel = trim(fgets(STDIN));
                echo "Numero de Asiento: ";
                $asiento = trim(fgets(STDIN));
                echo "Numero de ticket: ";
                $ticket = trim(fgets(STDIN));

                echo "**********************". "\n";
                echo "CATEGORIA DE PASAJERO". "\n";
                echo "**********************". "\n";
                echo "1. Pasajero Estandar.". "\n";
                echo "2. Pasajero Vip.". "\n";
                echo "3. Pasajero con Necesidades Especiales.". "\n";
                $categoria = trim(fgets(STDIN));
                if ($categoria == 1){
                    $objPasajero = new Pasajero($nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket);
                }elseif($categoria == 2){
                    echo "Numero de frecuencia: ";
                    $frecuencia = trim(fgets(STDIN));
                    echo "Millas: ";
                    $millas = trim(fgets(STDIN));
                    $objPasajero = new PasajeroVip($nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket, $frecuencia, $millas);
                }elseif($categoria == 3){
                    echo "**************************". "\n";
                    echo "SERVICIOS DE OFRECIMIENTO". "\n";
                    echo "**************************". "\n";
                    echo "1.Silla de ruedas". "\n";
                    echo "2.Asistencia". "\n";
                    echo "3.Comida Especial". "\n";
                    echo "4.TODAS". "\n";
                    $servicio = trim(fgets(STDIN));
                    if ($servicio == 4){
                        $servicio = "Silla de ruedas, asistencia y comida especial";
                    }elseif($servicio == 3){
                        $servicio = "Comida Especial";
                    }elseif($servicio == 2){
                        $servicio = "Asistencia";
                    }elseif($servicio == 1){
                        $servicio = "Silla de ruedas";
                    }
                    $objPasajero = new PasajeroNecesidadEspecial($nombrePas, $apellidoPas, $numeroDoc, $numeroTel, $asiento, $ticket, $servicio);
                }

                $realizarVenta = $objViaje->venderPasaje($objPasajero);
                if($realizarVenta != -1){
                    echo "Venta Realizada!". "\n";
                }else{
                    echo "El cupo de pasajeros para el viaje con destino a <<". $objViaje->getDestino(). ">> ya esta completo.". "\n";
                }
            }
            
            break;
        case '3':
            echo "\n";
            echo $objViaje . "\n";
            break;
        case '4':
            
    }
}while($opcion !=4);
