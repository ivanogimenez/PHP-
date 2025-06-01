<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart tv 55\" 4k UHD",
    "marca" => "Hitachi",
    "modelo" => "55HDE8000",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 ",
    "marca" => "Samsung",
    "modelo" => "A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "2900F",
    "stock" => 2,
    "precio" => 45000,
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy S23 ultra tornazol",
    "marca" => "Samsung",
    "modelo" => "SM-S918B",
    "stock" => 30,
    "precio" => 120000,
);
$aProductos[] = array(
    "nombre" => "Aire acondicionado Inverter split Frio/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "SRY-2900F",
    "stock" => 5,
    "precio" => 45000,
);
$aProductos[] = array(
    "nombre" => "Impresora HP Laser",
    "marca" => "HP",
    "modelo" => "LaserJet Pro P1101dw",
    "stock" => 10,
    "precio" => 20000,
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
                        $subtotal = 0;
                        for ($contador = 0; $contador < count($aProductos); $contador++) {
                            echo "<tr>";
                            echo "<td>" . $aProductos[$contador]["nombre"] . "</td>";
                            echo "<td>" . $aProductos[$contador]["marca"] . "</td>";
                            echo "<td>" . $aProductos[$contador]["modelo"] . "</td>";
                            echo "<td>" . ($aProductos[$contador]["stock"] > 10 ? "Hay stock" : ($aProductos[$contador]["stock"] > 0 ? "Hay poco stock" : "No hay stock")) . "</td>";
                            echo "<td>$" . number_format($aProductos[$contador]["precio"], 2, ',', '.') . "</td>";
                            echo "<td><button class='btn btn-primary'>Comprar</button></td>";
                            echo "</tr>";

                            $subtotal += $aProductos[$contador]["precio"]; // Sumamos precio
                        }
                        ?>
                    </tbody>
                </table>
                <h2 class="text-start">Subtotal: $<?php echo number_format($subtotal, 2, ',', '.'); ?></h2>
            </div>
        </div>
    </main>
</body>

</html>