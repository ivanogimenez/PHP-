<?php 
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array ();
    $aProductos[] = array ("nombre" => "Smart tv 55\" 4k UHD",
    "marca" => "Hitachi",
    "modelo" => "55HDE8000",
    "stock" => 60,
    "precio" => 58000,
    );
    $aProductos[] = array ("nombre" =>  
    "Smart tv 49\" 4k UHD",
    "marca" => "Samsung",
    "modelo" => "49KU6290",
    "stock" => 30,
    "precio" => 45000,
    );
    $aProductos[] = array ("nombre" =>
    "Smart tv 40\" 4k UHD",
    "marca" => "LG",
    "modelo" => "40UM7300",
    "stock" => 50,
    "precio" => 38000,
    );
    $aProductos[] = array ("nombre" =>
    "Smart tv 43\" 4k UHD",
    "marca" => "Sony",
    "modelo" => "43X720E",
    "stock" => 70,
    "precio" => 42000,
    );

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
    <div class="row">
        <div class="col-12">
            <h1 class="py-5 text-center">Listado de Productos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>Nombre </th>
                        <th>Marca </th>
                        <th>Modelo </th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Accion </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($contador = 0; $contador < count($aProductos); $contador++) { 
                        echo "<tr>";
                            echo "<td>". $aProductos[$contador] ["nombre"] . "</td>";
                            echo "<td>" . $aProductos[$contador] ["marca"] . "</td>";
                            echo "<td>" . $aProductos[$contador] ["modelo"] . "</td>";
                            echo "<td>" . ($aProductos[$contador] ["stock"] >10 ? "Hay stock" : ($aProductos[$contador]["stock"] >0 && $aProductos[$contador]["stock"] <= 10 ? "Hay poco stock" : "No hay stock")) . "</td>";
                            echo "<td>$" . number_format($aProductos[$contador]["precio"], 2, ',', '.') . "</td>";
                            echo "<td><button class='btn btn-primary'>Comprar</button></td>";
                            echo "</tr>";
                        } 
                    ?>
                   
            </table>
        </div>
    </div> 
<!--Bucle  for -->
    <?php
        for($contador = 0; $contador <= 100; $contador+=2) { 
            echo$contador . "<br>";
        } 
    ?>
    <br>
    <?php
        for($contador = 0; $contador < 10; $contador +=5) {//$contador = $contador +5 
            echo $contador . "<br>";
            echo "$contador <br>";
        } 
    ?>
    <br>
    <?php
        for($contador = 0; $contador <= 100, $contador !=60; $contador+=2) { //$contador = $contador +2
            echo$contador . "<br>";
        } 
    ?>
   </main> 
</body>
</html>