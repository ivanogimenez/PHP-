<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    // Si el archivo existe, cargo las tareas en la variable $aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    // Si el archivo no existe, creo un array vacío
    $aTareas = array();
}

// Obtener ID
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET["id"] >= 0) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($_POST) {
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if ($id !== "") {
        // Estoy editando una tarea
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    } else {
        // Estoy creando una nueva tarea
        $aTareas[] = array(
            "fecha" => date("Y-m-d"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    }

    // Convertir el array de aTareas en Json
    $strJson = json_encode($aTareas, JSON_PRETTY_PRINT);
    // Almacenar en un archivo.txt el Json con file_put_contents
    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");
    exit;
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);

    // Convertir $aTareas en Json
    $strJson = json_encode($aTareas, JSON_PRETTY_PRINT);

    // Almacenar el Json en el archivo
    file_put_contents("archivo.txt", $strJson);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Gestor de Tareas</title>
</head>

<body class="bg-light">
    <main class="container">
        <div class="row">
            <div class="col-12 pt-5 pb-3 text-center">
                <h1>Gestor de Tareas</h1>
            </div>
        </div>
        <div class="row pb-3">
            <div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4 py-1">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alta" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta") ? "selected" : ""; ?>>Alta</option>
                                <option value="Media" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media") ? "selected" : ""; ?>>Media</option>
                                <option value="Baja" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja") ? "selected" : ""; ?>>Baja</option>
                            </select>
                        </div>

                        <div class="col-4 py-1">
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Ana" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana") ? "selected" : ""; ?>>Ana</option>
                                <option value="Bernabe" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe") ? "selected" : ""; ?>>Bernabe</option>
                                <option value="Daniela" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela") ? "selected" : ""; ?>>Daniela</option>
                            </select>
                        </div>

                        <div class="col-4 py-1">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Sin asignar" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar") ? "selected" : ""; ?>>Sin asignar</option>
                                <option value="En progreso" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En progreso") ? "selected" : ""; ?>>En progreso</option>
                                <option value="Finalizado" <?php echo (isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Finalizado") ? "selected" : ""; ?>>Finalizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-12 py-1">
                            <label for="txtTitulo">Título</label>
                            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""; ?>">
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-12 py-1">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea id="txtDescripcion" name="txtDescripcion" rows="3" class="form-control"><?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""; ?></textarea>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-12 py-1 text-center">
                            <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-success">ENVIAR</button>
                            <a href="index.php" class="btn btn-danger" type="reset">CANCELAR</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (count($aTareas)): ?>
            <div class="row">
                <div class="col-12 pt-3">
                    <table class="table table-hover border shadow">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea): ?>
                                <tr>
                                    <td><?php echo $pos ?></td>
                                    <td><?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos ?>&do=editar" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12 pt-3">
                    <div class="alert alert-info mt-4" role="alert">
                        Aún no se han cargado tareas
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
