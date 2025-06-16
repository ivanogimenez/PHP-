<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Leer archivo si existe
if (file_exists("archivo.txt")) {
    $jsonClientes = file_get_contents("archivo.txt");
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}

// Obtener posición si se está editando
$pos = isset($_GET["pos"]) && is_numeric($_GET["pos"]) ? $_GET["pos"] : "";

// Guardar cliente nuevo o editar existente
if ($_POST) {
    $documento = htmlspecialchars(trim($_POST["txtDocumento"]));
    $nombre = htmlspecialchars(trim($_POST["txtNombre"]));
    $telefono = htmlspecialchars(trim($_POST["txtTelefono"]));
    $correo = htmlspecialchars(trim($_POST["txtCorreo"]));
    $nombreImagen = "";

    // Verificar si se subió archivo
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("YmdHis");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));

        if (in_array($extension, ["jpg", "jpeg", "png"])) {
            $nombreImagen = $nombreAleatorio . "." . $extension;
            move_uploaded_file($archivo_tmp, "imagenes/" . $nombreImagen);
        }
    }

    if ($pos !== "") {
        // Si hay imagen nueva, eliminar la anterior
        if (!empty($nombreImagen) && !empty($aClientes[$pos]["imagen"]) && file_exists("imagenes/" . $aClientes[$pos]["imagen"])) {
            unlink("imagenes/" . $aClientes[$pos]["imagen"]);
        } else {
            // Mantener la imagen anterior si no se subió una nueva
            $nombreImagen = $aClientes[$pos]["imagen"];
        }

        // Actualizar cliente
        $aClientes[$pos] = array(
            "documento" => $documento,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    } else {
        // Insertar nuevo cliente
        $aClientes[] = array(
            "documento" => $documento,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    }

    // Guardar en archivo
    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
    exit;
}

// Eliminar cliente
if (isset($_GET["do"]) && $_GET["do"] == "eliminar" && $pos !== "") {
    // Eliminar imagen si existe
    if (!empty($aClientes[$pos]["imagen"]) && file_exists("imagenes/" . $aClientes[$pos]["imagen"])) {
        unlink("imagenes/" . $aClientes[$pos]["imagen"]);
    }

    unset($aClientes[$pos]);
    $aClientes = array_values($aClientes); // Reindexar

    file_put_contents("archivo.txt", json_encode($aClientes));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>ABM Clientes</title>
</head>
<body>
<main class="container px-5">
    <div class="row">
        <div class="col-12 py-5">
            <h1 class="text-center">Registro de Clientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6 shadow p-3 mb-5 bg-white rounded">
            <form action="index.php<?php echo ($pos !== "") ? "?pos=$pos" : ""; ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="">Documento: *</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control shadow"
                        value="<?php echo ($pos !== "") ? $aClientes[$pos]["documento"] : ""; ?>" required>
                </div>
                <div>
                    <label for="">Nombre: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control shadow"
                        value="<?php echo ($pos !== "") ? $aClientes[$pos]["nombre"] : ""; ?>" required>
                </div>
                <div>
                    <label for="">Teléfono: *</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control shadow"
                        value="<?php echo ($pos !== "") ? $aClientes[$pos]["telefono"] : ""; ?>" required>
                </div>
                <div>
                    <label for="">Correo: *</label>
                    <input type="email" name="txtCorreo" id="txtCorreo" class="form-control shadow"
                        value="<?php echo ($pos !== "") ? $aClientes[$pos]["correo"] : ""; ?>" required>
                </div>
                <div>
                    <label for="">Archivo adjunto</label>
                    <input type="file" name="archivo" id="archivo" class="form-control" accept=".jpg, .jpeg, .png">
                    <small class="d-block text-muted">Archivos admitidos: .jpg, .jpeg, .png</small>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary shadow">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Nuevo</a>
                </div>
            </form>
        </div>

        <div class="col-6 pt-4">
            <table class="table table-hover border shadow">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($aClientes as $indice => $cliente): ?>
                    <tr>
                        <td>
                            <?php if (!empty($cliente["imagen"]) && file_exists("imagenes/" . $cliente["imagen"])): ?>
                                <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail" width="80">
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
                        <td><?php echo $cliente["documento"]; ?></td>
                        <td><?php echo $cliente["nombre"]; ?></td>
                        <td><?php echo $cliente["correo"]; ?></td>
                        <td>
                            <a href="index.php?pos=<?php echo $indice; ?>"><i class="bi bi-pencil"></i></a>
                            <a href="index.php?pos=<?php echo $indice; ?>&do=eliminar" onclick="return confirm('¿Desea eliminar este cliente?');"><i class="bi bi-trash3-fill text-danger"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
