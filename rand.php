<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valor = rand(1, 5);
/* 
echo "Numero generado: $valor<br>";
if ($valor == 1 || $valor == 3 || $valor == 5){
    echo "El numero $valor es impar";
} else{
    echo "El numero $valor es par";
}
 */
 echo $valor == 1 || $valor == 3 || $valor == 5 ? "El numero $valor es impar" : "El numero $valor es par"
?>