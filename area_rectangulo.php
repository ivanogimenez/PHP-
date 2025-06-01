<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

function calcularAreaRec($base,$altura){
    $area = $base * $altura;
    return $area;
    }
    echo "El área es: ".calcularAreaRec(100,0.60) . "<br>";
    echo "El área es: ".calcularAreaRec(800,300); 

?>