<?php
ini_set("display_error ", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

// Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array 
//los DNIs permitidos
if (file_exists("invitados.txt")) {
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");
    print_r($aDocumentos);
}else {
    $aDocumentos = array(); 
}

//sino el array queda como un array vacio 

if($_POST){
    $documento = $_REQUEST["txtDocumento"];
    if(isset($_POST["btnProcesar"])){
        //Si el DNI imngresado se encuentra en la lista se mostrará un mensaje de bienvenido
        if(in_array($documento, $aDocumentos)){
            $mensaje = "Bienvenido, su DNI es: $documento";
        } else {
            $mensaje = "Lo siento, no está en la lista de invitados";
        }
        //sino un mensaje de No se enuentra en la lista de invitados.
    }

    if(isset($_POST["btnVip"])){
        $codigo = $_REQUEST["txtCodigo"];
        //Si el codigo es verde entonces mostrará Su código de acceso es...
        if($codigo == "verde"){
            $mensaje = "Su código de acceso es: $codigo" . rand(1000, 9999)
            } else {
                $mensaje = "Lo siento, su código no es pase VIP";
        //Sino Ud. no tiene pase VIP
    }
}
?>