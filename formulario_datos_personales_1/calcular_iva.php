<?php
ini_set("display_errors", 1);
ini_set("display_startup_eror", 1);
error_reporting(E_ALL);


$iva = $precio_sin = $precio_con = $iva_cantidad = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iva = isset($_POST["iva"]) ? floatval($_POST["iva"]) : 21;
    $precio_sin = $_POST["precio_sin"] !== "" ? floatval($_POST["precio_sin"]) : null;
    $precio_con = $_POST["precio_con"] !== "" ? floatval($_POST["precio_con"]) : null;

    $multiplicador = 1 + ($iva / 100);

    if ($precio_sin !== null && $precio_con === null) {
        $precio_con = $precio_sin * $multiplicador;
        $iva_cantidad = $precio_con - $precio_sin;
    } elseif ($precio_con !== null && $precio_sin === null) {
        $precio_sin = $precio_con / $multiplicador;
        $iva_cantidad = $precio_con - $precio_sin;
    } elseif ($precio_con !== null && $precio_sin !== null) {
        $error = "⚠️ Por favor, completa solo uno de los dos campos.";
    } else {
        $error = "⚠️ Por favor, ingresa al menos un valor.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-4">Calculadora de IVA</h1>
    <div class="row justify-content-center">
        <!-- Formulario -->
        <div class="col-md-5">
            <form method="post" class="bg-white p-4 rounded shadow-sm border">
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="iva" class="form-control">IVA</label>
                    <select name="iva" id="iva" class="form-select">
                        <option value="10.5" <?= $iva == 10.5 ? "selected" : "" ?>>10.5%</option>
                        <option value="21" <?= $iva == 21 ? "selected" : "" ?>>21%</option>
                        <option value="27" <?= $iva == 27 ? "selected" : "" ?>>27%</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="precio_sin" class="form-control">Precio sin IVA:</label>
                    <input type="number" step="0.01" name="precio_sin" id="precio_sin" class="form-control" value="<?= $precio_sin !== "" && $precio_sin !== null ? number_format($precio_sin, 2, '.', '') : "" ?>">
                </div>

                <div class="mb-3">
                    <label for="precio_con" class="form-control">Precio con IVA:</label>
                    <input type="number" step="0.01" name="precio_con" id="precio_con" class="form-control" value="<?= $precio_con !== "" && $precio_con !== null ? number_format($precio_con, 2, '.', '') : "" ?>">
                </div>

                <button type="submit" class="btn btn-primary w-100">CALCULAR</button>
            </form>
        </div>

        <!-- Resultados -->
        <div class="col-md-6 mt-4 mt-md-0">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$error): ?>
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Resultados
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>IVA:</th>
                                <td><?= number_format($iva, 2) ?>%</td>
                            </tr>
                            <tr>
                                <th>Precio sin IVA:</th>
                                <td>$<?= number_format($precio_sin, 2) ?></td>
                            </tr>
                            <tr>
                                <th>Precio con IVA:</th>
                                <td>$<?= number_format($precio_con, 2) ?></td>
                            </tr>
                            <tr>
                                <th>IVA cantidad:</th>
                                <td>$<?= number_format($iva_cantidad, 2) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
