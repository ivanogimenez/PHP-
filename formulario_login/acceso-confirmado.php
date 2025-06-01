<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$usuario = isset($_POST['txtUsuario']) ? $_POST['txtUsuario'] : '';
$clave = isset($_POST['txtClave']) ? $_POST['txtClave'] : '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Bienvenid@ al Sistema </h1>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success" role="alert col-12">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At exercitationem odio eaque eligendi rem, possimus voluptas molestiae eveniet temporibus similique dolor expedita saepe sequi quaerat.
                </p>
                <a href="index.php" class="btn btn-primary float-end">Salir</a>
            </div>
        </div>
    </main>
</body>
</html>