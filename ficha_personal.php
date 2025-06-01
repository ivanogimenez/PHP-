<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*date_default_timezone_set("America/Argentina/Buenos_Aires");
$nombre = "Iván Claudio Giménez";
$edad = 35;
$aPeliculas = array("Harry Potter","The Lord fo the rings","Pride & Prejudice");
$aPeliculas = ["Harry Potter","The Lord fo the rings","Pride & Prejudice"];//Otra forma
*/
/* print_r($aPeliculas);
var_dump($aPeliculas);
*/
/*$miArray = array();
$miArray [0] = array();
$miArray [0] [0]= "Chau";
$miArray [0] [1]= "Adios";
$miArray [0] [2]= "Buenas Noches";
*/
/*
$miArray = array(
                array("Lu", "Ma", "Mi", "Ju", "Vi"),
                array("Curso", "Libre", "Curso", "Libre", "Curso" ),
                );




print_r($miArray);
*/
$aAuto = array ();
$aAuto["color"] = array ("Negro", "verde");
$aAuto["marca"] = "Ford";
$aAuto["anio"] = 1908;
$aAuto["precio"] = 800;

print_r($aAuto)

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Ficha Personal</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Fecha</th>
                        <td> <?php echo date("d/m/Y"); ?> </td>
                    </tr>
                    <tr>
                        <th>Nombre y Apellido</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Edad</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Peliculas Favoritas</th>
                        <td><?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas[1]; ?><br>
                            <?php echo $aPeliculas[2]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    
    </main>
    
</body>
</html>