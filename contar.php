<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


//Definicion
function contar($aArray){
    $contador = 0;
    foreach ($aArray as $item) {
        $contador++;
    }
    return $contador;
}
//Uso
$aNotas = array(9, 8, 9.50, 4, 7, 8);


$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombreyapellido" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5,
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombreyapellido" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);
$aPacientes[] = array(
    "dni" => "43.123.456",
    "nombreyapellido" => "Juan Irraola",
    "edad" => 28,
    "peso" => 79,
);
$aPacientes[] = array(
    "dni" => "13.456.789",
    "nombreyapellido" => "Luisa Gómez",
    "edad" => 50,
    "peso" => 79,
);
$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart tv 55\" 4k UHD",
    "marca" => "Hitachi",
    "modelo" => "55HDE8000",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array(
    "nombre" =>
    "Smart tv 49\" 4k UHD",
    "marca" => "Samsung",
    "modelo" => "49KU6290",
    "stock" => 30,
    "precio" => 45000,
);
$aProductos[] = array(
    "nombre" =>
    "Smart tv 40\" 4k UHD",
    "marca" => "LG",
    "modelo" => "40UM7300",
    "stock" => 50,
    "precio" => 38000,
);
$aProductos[] = array(
    "nombre" =>
    "Smart tv 43\" 4k UHD",
    "marca" => "Sony",
    "modelo" => "43X720E",
    "stock" => 70,
    "precio" => 42000,
);


echo "<br> Cantidad de Productos: " . contar($aPacientes) . "\n";
echo "Cantidad de Pacientes: " . contar($aNotas) . "\n";
echo "Cantidad de Notas: " . contar($aPacientes) . "\n";
