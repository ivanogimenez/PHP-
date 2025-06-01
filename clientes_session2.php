<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL); 
session_start();

if (!isset($_SESSION["listadoClientes"])){
    // si existe la variable de session listadoClientes asigno su contenido s aClientes
   $aClientes = $_SESSION["listadoClientes"] = array();
} else {
    // si no existe la variable de session listadoClientes asigno su contenido s aClientes
    $aClientes = array();
}

if ($_POST) {
    // Si hace click en enviar entonces:
    if(isset($_POST["btnEnviar"])){
    // Asignamos en variables los datos que vienen del formulario
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
    
    // Creamos un array que contendrá los datos del formulario de clientes
    $aClientes[] = array("nombre" => $nombre,
                        "dni" => $dni,
                        "telefono" => $telefono,
                        "edad" => $edad
    );
    //Actualiza el contenido de variable de session
    $_SESSION["listadoClientes"] = $aClientes;
    }
    //Si hace click en eliminar:
    //session_destroy();
    if(isset($_POST["btnEliminar"])){
        $aClientes = array();
        $_SESSION["listadoClientes"] = $aClientes;
    }
}
if(isset($_GET["pos"])){
    $pos = $_GET["pos"];
    if (isset($aClientes["pos"])){
        unset($aClientes[$pos]);
        $aClientes = array_values($aClientes);// Reindexar
        $_SESSION["listadoClientes"] = $aClientes;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <h1 class="text-center mb-5">Listado de Clientes</h1>
        <div class="row justify-content-center">
            <!-- Formulario -->
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="txtNombre" class="form-label">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtDni" class="form-label">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtTelefono" class="form-label">Teléfono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtEdad" class="form-label">Edad:</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="btnEnviar" class="btn btn-primary">Enviar</button>
                        <button type="submit" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                    </div>
                </form>
            </div>

            <!-- Tabla de clientes -->
            <div class="col-md-7">
                <table class="table table-bordered shadow">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($aClientes)): ?>
                            <?php foreach ($aClientes as $pos => $cliente): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($cliente["nombre"]); ?></td>
                                    <td><?php echo htmlspecialchars($cliente["dni"]); ?></td>
                                    <td><?php echo htmlspecialchars($cliente["telefono"]); ?></td>
                                    <td><?php echo htmlspecialchars($cliente["edad"]); ?></td>
                                    <td><a href="?pos=<?php echo $pos; ?>"> <i class="bi bi-trash3-fill text-danger"></i></a></td>
                                </tr>  
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay clientes cargados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
