<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] = array("dni" => 33300123, "nombre" => "David Garcia", "bruto" => 85000.30);
$aEmpleados[] = array("dni" => 40874456, "nombre" =>  "Ana del Valle", "bruto" =>90000);
$aEmpleado[] = array("dni" => 67567565, "nombre" => "Andres Pérez", "bruto" => 100000);
$aEmpleados[] = array("dni" => 75744545; "nombre" => "Victoria Luz", "bruto" =>70000);

function calcularNeto($bruto){
    $descuento = 0.17 * $bruto;
    $neto = $bruto - $descuento;
    return $neto;
    }
    echo "El sueldo es : $" . calcularNeto(80000) . "<br>";

?>