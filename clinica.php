<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de Pacientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-5">Listado de Pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
            <thead >
                <tr>
                    <th>DNI</th>
                    <th>Nombre y Apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
            </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i < count($aPacientes); $i++) { ?>
                <tr>
                    <td><?php echo $aPacientes [$i]["dni"]; ?></td>
                    <td><?php echo $aPacientes [$i]["nombreyapellido"]; ?></td>
                    <td><?php echo $aPacientes [$i]["edad"]; ?></td>
                    <td><?php echo $aPacientes [$i]["peso"]; ?></td>
                </tr>
                <?php } ?>


                <?php foreach ($aPacientes as $paciente) {
                    print_r ($paciente);
                        exit;
                    echo "<tr>";
                    echo "<td>" . $paciente["dni"] . "</td>";
                    echo "<td>" . $paciente["nombreyapellido"] . "</td>";
                    echo "<td>" .$paciente["edad"] . "</td>";
                    echo "<td>" .$paciente["peso"] . "</td>";
                    echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
            </div>
        </div>
                
            
        
    </main>
</body>
</html>