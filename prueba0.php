<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
$aAuto = array ();
$aAuto["color"] = array ("Negro", "verde");
$aAuto["marca"] = "Ford";
$aAuto["anio"] = 1908;
$aAuto["precio"] = "USD 800 a USD 1000";

echo "El Auto " . $aAuto["marca"] . " del año " . $aAuto["anio"] . " es de color " . $aAuto["color"][0] . " y su precio es " . $aAuto["precio"];
*/
/*
//Concatenacion
$nombre = "Juan";
$apellido = "Perez";
//echo "Me llamo " . $nombre . " " . $apellido;
echo "Me llamo $nombre $apellido";
*/
//Operadores y caracteres especiales
/*
\"
\\
\$
*/
//Scope
// $GLOBALS
$bruto = 50000; //ámbito global
function calcularNeto() {
    global $bruto; //referencia a la variable global MALA PRÁCTICA
    return $bruto - $bruto * 0.17; //ámbito local
    }
    echo "El monto neto es: " . calcularNeto() . "<br>";

function calcularNeto2($bruto) {
    return $bruto - $bruto * 0.17;
    }
    echo (calcularNeto($bruto)) . "<br>";


function test(){
    static $a = 0;
    return $a++;
    }
    echo (test() . "<br>");
    echo (test() . "<br>");
    echo (test() . "<br>");
    echo (test() . "<br>"); //Otra mala practica
function test1(){
    static $a = 0;
    return $a++;
    }
    echo (test1() . "<br>");
    echo (test1() . "<br>");
    echo (test1() . "<br>");



//Ejercicio (stock.php)
$aProductos = array ();
    $aProductos[] = array ("nombre" => "Smart tv 55\" 4k UHD",
    "marca" => "Hitachi",
    "modelo" => "55HDE8000",
    "stock" => 60,
    "precio" => 58000,
    );
    $aProductos[] = array ("nombre" => "Samsung Galaxy A30 ",
    "marca" => "Samsung",
    "modelo" => "A30",
    "stock" => 0,
    "precio" => 22000,
    );
    $aProductos[] = array ("nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "2900F",
    "stock" => 2,
    "precio" => 45000,
    );
    $aProductos [] = array ("nombre" => "Samsung Galaxy S23 ultra tornazol",
    "marca" => "Samsung",
    "modelo" => "SM-S918B",
    "stock" => 30,
    "precio" => 120000,
    );
    $aProductos [] = array ("nombre" => "Aire acondicionado Inverter split Frio/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "SRY-2900F",
    "stock" => 5,
    "precio" => 45000,
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
                    <tr>
                        <td><?php echo $aProductos[0] ["nombre"]; ?></td>
                        <td><?php echo $aProductos[0] ["marca"]; ?></td>
                        <td><?php echo $aProductos[0] ["modelo"]; ?></td>
                        <td><?php echo $aProductos[0] ["stock"] >10 ? "Hay stock" : ($aProductos[0]["stock"] >0 && $aProductos[0]["stock"] <= 10 ? "Hay poco stock" : "No hay stock"); ?></td>
                        <td><?php echo $aProductos[0] ["precio"]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><?php echo $aProductos[1] ["nombre"]; ?></td>
                        <td><?php echo $aProductos[1] ["marca"]; ?></td>
                        <td><?php echo $aProductos[1] ["modelo"]; ?></td>
                        <td><?php echo $aProductos[1] ["stock"] >10 ? "Hay stock" : ($aProductos[1]["stock"] > 0 && $aProductos[1]["stock"] <= 10 ? "Hay poco stock" : "No hay stock"); ?></td>
                        <td><?php echo $aProductos[1] ["precio"]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><?php echo $aProductos[2] ["nombre"]; ?></td>
                        <td><?php echo $aProductos[2] ["marca"]; ?></td>
                        <td><?php echo $aProductos[2] ["modelo"]; ?></td>
                        <td><?php echo $aProductos[2] ["stock"] >10 ? "Hay stock" : ($aProductos[2]["stock"] >0 && $aProductos[2]["stock"] <= 10 ? "Hay poco stock" : "No hay stock"); ?></td>
                        <td><?php echo $aProductos[2] ["precio"]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><?php echo $aProductos[3] ["nombre"]; ?></td>
                        <td><?php echo $aProductos[3] ["marca"]; ?></td>
                        <td><?php echo $aProductos[3] ["modelo"]; ?></td>
                        <td><?php echo $aProductos[3] ["stock"] >10 ? "Hay stock" : ($aProductos[3]["stock"] >0 && $aProductos[3]["stock"] <= 10 ? "Hay poco stock" : "No hay stock"); ?></td>
                        <td><?php echo $aProductos[3] ["precio"]; ?></td>
                        <td><button class="btn btn-primary">Comprar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   </main> 
</body>
</html>