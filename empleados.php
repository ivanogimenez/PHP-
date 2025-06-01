<?php
ini_set("display_errors", 1);
ini_set("display_status_error", 1);
error_reporting(E_ALL);

// Lista de empleados
$aEmpleados = array(
    array('dni' => "33300123", 'nombre' => "David García", "bruto" => 85000.30),
    array('dni' => "40874456", 'nombre' => "Ana del Valle", "bruto" => 90000),
    array('dni' => "67657565", 'nombre' => "Andrés Pérez", 'bruto' => 100000),
    array('dni' => "75744545", 'nombre' => "Victoria Luz", "bruto" => 70000),
);

// Función calcular sueldo neto
function calcularNeto($bruto) {
    return $bruto - ($bruto * 0.17);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center py-5">Listado de Empleados</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sueldo Neto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Recorrer la lista de empleados
                    foreach($aEmpleados as $empleado) { ?>
                        <tr>
                            <td><?php echo $empleado["dni"]; ?></td>
                            <td><?php echo mb_strtoupper($empleado["nombre"]); ?></td>
                            <td><?php echo "$" . number_format(calcularNeto($empleado["bruto"]), 2, ",", "."); ?></td>
                        </tr>

                    <?php 
                    
                }?>
                </tbody>
            </table>
            <p class="text-star fw-bold">Cantidad de empleados activos: <?php echo count($aEmpleados); ?></p>
        </div>
    </div>
</main>
</body>
</html>