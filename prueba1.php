<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
  
function concatenar($cadena1, $cadena2) {
    return "$cadena1 $cadena2";
}
$resultado = concatenar("El libro ", "de la Selva ");
echo $resultado ;

function sumar ($num1, $num2) {
    return $num1 + $num2;
}
function alcuadrado($num){
    return $num * $num;
}
$resultado = alcuadrado(sumar(2,8 ));
echo $resultado ;

function saludar($nombre, $apellido = ""){
    return " Hola , $nombre $apellido";
    }
    $saludar = saludar("Ana ", "Perez ");
echo $saludar ;

function saludo($nombre, $apellido = ""){
    return " Hola , $nombre $apellido"; //return "Hola".$nombre."".$apellido;
    }
    $saludo= saludo("Ana ","Pérez ");
echo $saludo ;//Hola Ana Pérez
echo (saludo("Ricardo "));//Hola Ricardo

?>