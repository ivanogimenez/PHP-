<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;

if($_POST){
    $iva = $_POST["lstIva"];
    $precioSinIva = ($_POST["txtPrecioSinIva"])> 0? $_POST["txtPrecioSinIva"] : 0;
    $precioConIva = ($_POST["txtPrecioConIva"])> 0? $_POST["txtPrecioConIva"] : 0;

    //Dado un importe sin IVA, calcular el importe con IVA * (21/100+1) 
    if($precioSinIva > 0){
        $precioConIva = $precioSinIva * ($iva/100 + 1);
    //Dado un importe con IVA, calcular el importe sin IVA / (21/100+1)
    if($precioConIva > 0) {
        $precioSinIva = $precioConIva / ($iva/100 + 1);
    }
    //Dado un importe con IVA, Precio sin IVA / (21/100+1)
    $ivaCantidad = $precioConIva - $precioSinIva;
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Calcular IVA</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class ="col-3 offset-2">
                <form method="POST"> <!-- Opcional par calculo automatico </form id="formIva" onsubmit="return false;">-->
                    <div class="pb-3">
                        <label for="">IVA</label>
                        <select name="lstIva" id="lstIva" class="form-control">
                            <option value="10.5">10.5</option>
                            <option value="19">19</option>
                            <option value="21" selected>21</option>
                            <option value="27">27</option>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="">Precio sin IVA: </label>
                        <input type="text" id="txtPrecioSinIva" name="txtPrecioSinIva" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Precio con IVA</label>
                        <input type="text" id="txtPrecioConIva" name="txtPrecioConIva" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit"> ENVIAR </button>
                    </div>
                </form>
            </div>
            <div class="col-5 pt-4">
                <table class="table table-hover border ">
                    <tr>
                        <th>IVA</th>
                        <td><?php echo $iva; ?> %</td> <!-- <td id="tdIva:" ></td> --> 
                    </tr>
                    <tr>
                        <th>Precio sin IVA: </th>
                        <td><?php echo number_format($precioSinIva ,2 ,",", "."); ?></td> <!-- <td id="tdSinIva:" ></td> -->
                    </tr>
                    <tr>
                        <th>Precio con IVA: </th>
                        <td> <?php echo number_format($precioConIva,2 ,",", "."); ?></td> <!-- <td id="tdConIva:" ></td> -->
                    </tr>
                    <tr>
                        <th>IVA Cantidad</th>
                        <td><?php echo number_format($ivaCantidad, 2,",","."); ?></td> <!-- <td id="tdCantidadIva:" ></td> -->
                    </tr>
                </table>
            </div>
        </div>
    </main>
    <!-- <script>
        const ivaSelect = document.getElementById("lstIva");
        const sinIvaInput = document.getElementById("txtPrecioSinIva");
        const conIvaInput = document.getElementById("txtPrecioConIva");

        const tdIva = document.getElementById("tdIva");
        const tdSinIva = document.getElementById("tdSinIva");
        const tdConIva = document.getElementById("tdConIva");
        const tdIvaCantidad = document.getElementById("tdIvaCantidad");

        function actualizarDesdeSinIva() {
            const iva = parseFloat(ivaSelect.value);
            const precioSinIva = parseFloat(sinIvaInput.value);

            if (!isNaN(precioSinIva)) {
                const ivaCantidad = precioSinIva * iva / 100;
                const precioConIva = precioSinIva + ivaCantidad;

                conIvaInput.value = precioConIva.toFixed(2);
                actualizarTabla(iva, precioSinIva, precioConIva, ivaCantidad);
            }
        }

        function actualizarDesdeConIva() {
            const iva = parseFloat(ivaSelect.value);
            const precioConIva = parseFloat(conIvaInput.value);

            if (!isNaN(precioConIva)) {
                const precioSinIva = precioConIva / (1 + iva / 100);
                const ivaCantidad = precioConIva - precioSinIva;

                sinIvaInput.value = precioSinIva.toFixed(2);
                actualizarTabla(iva, precioSinIva, precioConIva, ivaCantidad);
            }
        }

        function actualizarTabla(iva, sinIva, conIva, ivaCantidad) {
            tdIva.textContent = iva + " %";
            tdSinIva.textContent = "$ " + sinIva.toFixed(2);
            tdConIva.textContent = "$ " + conIva.toFixed(2);
            tdIvaCantidad.textContent = "$ " + ivaCantidad.toFixed(2);
        }

        ivaSelect.addEventListener("change", () => {
            if (sinIvaInput.value) {
                actualizarDesdeSinIva();
            } else if (conIvaInput.value) {
                actualizarDesdeConIva();
            }
        });

        sinIvaInput.addEventListener("input", actualizarDesdeSinIva);
        conIvaInput.addEventListener("input", actualizarDesdeConIva);
    </script>
-->
</body>
</html>