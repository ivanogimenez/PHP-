<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

//Definicion
function print_f($variable){
    if(is_array($variable)){
        $archivo = fopen("archivo.txt", "a+");

        //Si e un array, lo recorro y guardo el contenido en el archivo "datos.txt"
            fwrite($archivo, "\n\nDatos del array ==> \n");

        foreach($variable as $item){
            fwrite($archivo, $item."\n");
        }
        fclose($archivo);
    } else {
        //Si no es un array, lo guardo directamente en el archivo "datos.txt"
        $contenido = "Datos de la variable ==>\n" . $variable;
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo generado.";
}
//Uso
$aNotas = array(8, 5, 7, 9, 10);
$msg = "Este es un mensaje!";
print_f($aNotas);


?>