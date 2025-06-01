<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if($_POST);{
    $usuario = $_POST['txtUsuario'] ?? '';
    $clave = $_POST['txtClave'] ?? '';

    if($usuario == "admin" && $clave == "123456"){
        header("Location: https://google.com");
        } else {
            $msg = "Usuario o contraseña incorrectos";
        }
} 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <title>Formulario</title>
</head>
<body>
    <header>
        
    </header>

    <main class="container">
    <div class="row">
        <div class="col-12">
            <h1>Formulario</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="">
                <div class="form-group py-3">
                    <label for="txtUsuario">Usuario: </label>
                    <input type="text" name="txtUsusario" id="txtUsuario">
                </div>
                <div class="form-group py-3">
                    <label for="txtClave">Password: </label>
                    <input type="password" name="txtClave" id="txtClave">
                </div>
                <div class="py-3">
                    <button class="btn btn-primary" type="submit">Ingresar </button>
                </div>
            </form>
        </div>
    </div>
    </main>

    <footer>
        
    </footer>
</body>
</html>