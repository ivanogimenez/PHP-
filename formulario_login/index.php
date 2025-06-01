<?php
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if($_POST){
    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

    //Si Usuario es distinto de vacio Y clave es distinto de vacio, entonces:
    if($usuario != "" && $clave != ""){
        header("Location: acceso-confirmado.php");
    } else {
    $mensaje = "Válido para usuarios reguistrados.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(isset($mensaje)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
                <form  method="POST" action="">
                    <div class="form-group my-3">
                        <label for="">Usuario: <input type="text" id="txtUsuario" name="txtUsuario" class="form-control"> </label>
                    </div>
                    <div class="my-3">
                        <label for="">Clave: <input type="password" id="txtClave" name="txtClave" class="form-control"></label>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primay" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>