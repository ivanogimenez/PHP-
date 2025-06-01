<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
 


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <main class="container">
    
                    <?php
                        for ($aListado =1; $aListado <=100 ; $aListado++){
                            echo $aListado . "<br>";
                        }
                    ?>
                    <?php
                    for ($i =0; $i <=100 ; $i +1){ //segunda opcion
                        echo $i . "<br>";
                    }
                ?>
                    
                    <br>
                    <?php
                        for ($aListado =1; $aListado <=100 ; $aListado++){
                            if($aListado % 2 == 0) { 
                                echo $aListado . "<br>";
                            }
                        }
                
                    ?>
                    <?php
                        for ($i = 2; $i <=100 ; $i +=2){ //segunda opcion
                            echo $i . "<br>";
                        }
                    ?>
                    <br>
                    <?php
                        for ($aListado =1; $aListado <=100 ; $aListado++){
                            if($aListado % 2 == 0) { 
                                echo $aListado . "<br>";
                                if($aListado == 60)
                                {break;}
                            }
                        }
                    ?> 
                    <?php
                        for ($i = 2; $i <=100 ; $i +=2){ //segunda opcion
                            echo $i . "<br>";
                            if($i == 60){break;}
                        }
                    ?>   
   </main> 
</body>
</html>