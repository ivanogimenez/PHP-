<?php
ini_set("display_errors", 1);
ini_set("dislay_startup_error", 1);
error_reporting(E_ALL);

//Definicion
function promediar($aNumeros) {
    $suma = 0;
    foreach ($aNumeros as $numero) {
        $suma += $numero;
    }
    return $suma / count($aNumeros); 
    if ($cantidad > 0) {
        return $suma / $cantidad;
    } else {
        return 0; // asi evitamos la division por cero
    }
    
}
//uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos =array (800, 400, 500, 300, 900, 10000);
echo "Ela promedio es: " . promediar($aNotas) . "\n";
echo "El promedio de sueldos es: " . promediar($aSueldos) . "\n";

?>

