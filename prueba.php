<?php

ini_set("display_error", 1);
ini_set("display_startup_eroors", 1);
error_reporting(E_ALL);



if ($_POST){ /* pregunta si el usuario envio datos en el formulario, es el evento postback */

    $usuario = $_POST['txtUsuario'] ?? '';
    $clave = $_POST['txtClave'] ?? '';

    if($usuario == "admin" && $clave == "123456"){
        header("Location: https://google.com");
    } else {
        $msg = "Error de autenticacion de usuario o clave";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Formulario</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>
                    Formulario de Ingreso
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="alert alert-success" role="alert">
                    <?php if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                </div>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="">Usuario</label>
                        <input type="text" name="textUsuario" id="textUsuario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Clave</label>
                        <input type="password" name="textClave" id="textClave" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="btnIngresar" class="btn btn-primary">
                            Ingresar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>