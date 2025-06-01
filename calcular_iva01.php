<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iva = isset($_POST["lstIva"]) ? floatval($_POST["lstIva"]) : 21;
    $precioSinIva = isset($_POST["txtPrecioSinIva"]) ? floatval($_POST["txtPrecioSinIva"]) : 0;
    $precioConIva = isset($_POST["txtPrecioConIva"]) ? floatval($_POST["txtPrecioConIva"]) : 0;

    if ($precioSinIva > 0 && $precioConIva == 0) {
        // Solo se ingresó precio sin IVA
        $precioConIva = $precioSinIva * (1 + $iva / 100);
        $ivaCantidad = $precioConIva - $precioSinIva;
    } elseif ($precioConIva > 0 && $precioSinIva == 0) {
        // Solo se ingresó precio con IVA
        $precioSinIva = $precioConIva / (1 + $iva / 100);
        $ivaCantidad = $precioConIva - $precioSinIva;
    } elseif ($precioConIva > 0 && $precioSinIva > 0) {
        // Ambos valores presentes, se calcula diferencia
        $ivaCantidad = $precioConIva - $precioSinIva;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular IVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-12 text-center py-5">
            <h1>Calculadora de IVA</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3 offset-2">
            <form method="POST">
                <div class="pb-3">
                    <label for="lstIva">IVA</label>
                    <select name="lstIva" id="lstIva" class="form-control">
                        <option value="10.5" <?= ($iva == 10.5) ? "selected" : "" ?>>10.5%</option>
                        <option value="19" <?= ($iva == 19) ? "selected" : "" ?>>19%</option>
                        <option value="21" <?= ($iva == 21) ? "selected" : "" ?>>21%</option>
                        <option value="27" <?= ($iva == 27) ? "selected" : "" ?>>27%</option>
                    </select>
                </div>
                <div class="pb-3">
                    <label for="txtPrecioSinIva">Precio sin IVA</label>
                    <input type="text" id="txtPrecioSinIva" name="txtPrecioSinIva" class="form-control" value="<?= $precioSinIva > 0 ? number_format($precioSinIva, 2, '.', '') : '' ?>">
                </div>
                <div class="pb-3">
                    <label for="txtPrecioConIva">Precio con IVA</label>
                    <input type="text" id="txtPrecioConIva" name="txtPrecioConIva" class="form-control" value="<?= $precioConIva > 0 ? number_format($precioConIva, 2, '.', '') : '' ?>">
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Calcular</button>
                </div>
            </form>
        </div>

        <div class="col-5 pt-4">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <table class="table table-hover border">
                <tr>
                    <th>IVA</th>
                    <td><?= $iva ?>%</td>
                </tr>
                <tr>
                    <th>Precio sin IVA</th>
                    <td>$ <?= number_format($precioSinIva, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Precio con IVA</th>
                    <td>$ <?= number_format($precioConIva, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Cantidad de IVA</th>
                    <td>$ <?= number_format($ivaCantidad, 2, ',', '.') ?></td>
                </tr>
            </table>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>
</html>
