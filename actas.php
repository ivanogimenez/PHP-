<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Definicion
function promediar($aNumeros) {
    $suma = 0;
    foreach ($aNumeros as $numero) {
        $suma += $numero;
    }
    $cantidad = count($aNumeros);
    return $cantidad > 0 ? $suma / $cantidad : 0;
}     

$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Ana Valle", "notas" => array(7,8));
$aAlumnos[] = array("nombre" => "Bernabe Paz", "notas" => array(5,7));
$aAlumnos[] = array("nombre" => "Sebastian Aguirre", "notas" => array(6,9));
$aAlumnos[] = array("nombre" => "Monica Ledesma", "notas" => array(8,9));

$sumaPromedios = 0;
$cantidadAlumnos = count($aAlumnos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <title>Actas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-4 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-5">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aAlumnos as $alumno): 
                            $promedio = promediar($alumno["notas"]);
                            $sumaPromedios += $promedio;
                            ?>
                        <tr>
                            <td><?php echo $alumno["nombre"]; ?></td>
                            <td><?php echo $alumno["notas"][0]; ?></td>
                            <td><?php echo $alumno["notas"][1]; ?></td>
                            <td><?php echo number_format($promedio, 2, ",", "."); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <?php
                        $promedioCurso = $sumaPromedios / $cantidadAlumnos;
                        ?>
                            <p><strong> Promedio de la cursada: <?php echo number_format($promedioCurso, 2,",","."); ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>