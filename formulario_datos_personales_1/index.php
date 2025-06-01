<?php
ini_set("display_startup_error", 1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Formulario de datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="resultado.php" method="POST">
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label for="txt">DNI</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div>
                        <label for="txt">Teléfono</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div>
                        <label for="txtNombre">Edad</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            ENVIAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>