<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);
session_start();

// Inicializar array si no existe
if (!isset($_SESSION["listadoClientes"])) {
    $_SESSION["listadoClientes"] = array();
}
$aClientes = $_SESSION["listadoClientes"];

// Si se envía el formulario para agregar un cliente
if ($_POST) {
    if (isset($_POST["agregar"])) {
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        );

        $_SESSION["listadoClientes"] = $aClientes;
    }

    if (isset($_POST["btnEliminar"])) {
        $_SESSION["listadoClientes"] = array();
        $aClientes = array();
    }
}

// Eliminar un cliente individual
if (isset($_GET["pos"])) {
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
    $_SESSION["listadoClientes"] = array_values($aClientes); // Reindexar
    header("Location: clientes_session.php");
    exit;
}

// Eliminar todos los clientes
if (isset($_GET["borrar_todos"])) {
    $_SESSION["listadoClientes"] = array();
    header("Location: clientes_session.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap y Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 text-center py-5">
            <h1>Listado de clientes</h1>
        </div>

        <!-- Formulario -->
        <div class="col-3 offset me-5">
            <form method="post" class="bg-white p-4 rounded shadow-sm">
                <h4 class="mb-4">Agregar cliente</h4>
                <div class="mb-3">
                    <input type="text" name="txtNombre" class="form-control" placeholder="Nombre y apellido" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="txtDni" class="form-control" placeholder="DNI" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="txtTelefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <input type="number" name="txtEdad" class="form-control" placeholder="Edad" required>
                </div>
                <button type="submit" name="agregar" class="btn btn-primary">Enviar</button>
                <button type="submit" name="btnEliminar" class="btn btn-danger">Eliminar</button>
            </form>
        </div>

        <!-- Tabla de clientes -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Tabla de clientes</h2>
                <?php if (!empty($_SESSION['listadoClientes'])): ?>
                    <a href="?borrar_todos=1" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Estás seguro de borrar todos los clientes?');">Borrar todos</a>
                <?php endif; ?>
            </div>

            <div class="table-responsive bg-white shadow-sm rounded">
                <table class="table table-bordered mb-0">
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
                        <?php if (!empty($_SESSION['listadoClientes'])): ?>
                            <?php foreach ($_SESSION['listadoClientes'] as $index => $cliente): ?>
                                <tr>
                                    <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                                    <td><?= htmlspecialchars($cliente['dni']) ?></td>
                                    <td><?= htmlspecialchars($cliente['telefono']) ?></td>
                                    <td><?= htmlspecialchars($cliente['edad']) ?></td>
                                    <td>
                                        <a href="?pos=<?= $index ?>" class="btn btn-sm text-primary"
                                           onclick="return confirm('¿Eliminar este cliente?');">
                                           <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay clientes registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
