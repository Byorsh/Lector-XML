<?php
include 'modelo/conexion.php';
$idFactura=$_GET["id"];
$sql2=$conexion->query("SELECT * FROM factura WHERE id = $idFactura");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector de XML 4.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f97f4ca027.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php

    while ($datosFactura=$sql2->fetch_object()) { ?>
    <h1 class="text-center">Factura <?=$datosFactura->serie ?> <?=$datosFactura->folio ?></h1>
    <br>
        <div class="container d-flex justify-content-center">
            <form action="" class="col-4 p-3">
                <h3 class="text-center text-secondary">Datos de la factura</h3>
                
                <div class="mb-1">
                    <label for="uuid" class="form-label">UUID</label>
                    <input class="form-control" type="text" name="uuid" value="<?=$datosFactura->uuid ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="serie" class="form-label">Serie</label>
                    <input class="form-control" type="text" name="serie" value="<?=$datosFactura->serie ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="folio" class="form-label">Folio</label>
                    <input class="form-control" type="text" name="folio" value="<?=$datosFactura->folio ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input class="form-control" type="text" name="fecha" value="<?=$datosFactura->fecha ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="lugarExpedicion" class="form-label">Lugar de expedicion</label>
                    <input class="form-control" type="text" name="lugarExpedicion" value="<?=$datosFactura->lugarExpedicion ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="metodoPago" class="form-label">Metodo de pago</label>
                    <input class="form-control" type="text" name="metodoPago" value="<?=$datosFactura->metodoPago ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="moneda" class="form-label">Moneda</label>
                    <input class="form-control" type="text" name="moneda" value="<?=$datosFactura->moneda ?>" disabled>
                </div>

            </form>
            <form action="" class="col-4 p-3">
                <h3 class="text-center text-secondary">Datos del emisor</h3>
                
                <div class="mb-1">
                    <label for="nombreEmisor" class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombreEmisor" value="<?=$datosFactura->nombreEmisor ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="rfcEmisor" class="form-label">RFC</label>
                    <input class="form-control" type="text" name="rfcEmisor" value="<?=$datosFactura->rfcEmisor ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="regimenFiscalEmisor" class="form-label">Regimen fiscal</label>
                    <input class="form-control" type="text" name="regimenFiscalEmisor" value="<?=$datosFactura->regimenFiscalEmisor ?>" disabled>
                </div>
            </form>
            <form action="" class="col-4 p-3">
                <h3 class="text-center text-secondary">Datos del receptor</h3>
                
                <div class="mb-1">
                    <label for="nombreReceptor" class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombreReceptor" value="<?=$datosFactura->nombreReceptor ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="rfcReceptor" class="form-label">RFC</label>
                    <input class="form-control" type="text" name="rfcReceptor" value="<?=$datosFactura->rfcReceptor ?>" disabled>
                </div>
                <div class="mb-1">
                    <label for="regimenFiscalReceptor" class="form-label">Regimen fiscal</label>
                    <input class="form-control" type="text" name="regimenFiscalReceptor" value="<?=$datosFactura->regimenFiscalReceptor ?>" disabled>
                </div>
            </form>
        </div>
    <?php

    ?>
    <div class="p-4 d-flex">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Clave de Producto o Servicio</th>
                <th scope="col">Clave de unidad</th>
                <th scope="col">Unidad</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Valor unitario</th>
                <th scope="col">Descuento</th>
                <th scope="col">Importe base</th>
                <th scope="col">Base</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "modelo/conexion.php";
                $sql=$conexion->query("SELECT * FROM conceptos WHERE idFactura = $idFactura");

                while($datos=$sql->fetch_object()){ ?>
                <tr>
                    <td><?= $datos->id ?></td>
                    <td><?= $datos->claveProdServ ?></td>
                    <td><?= $datos->claveUnidad ?></td>
                    <td><?= $datos->unidad ?></td>
                    <td><?= $datos->cantidad ?></td>
                    <td><?= $datos->descripcion ?></td>
                    <td><?= $datos->valorUnitario ?></td>
                    <td><?= $datos->descuento ?></td>
                    <td><?= $datos->importeBase ?></td>
                    <td><?= $datos->base ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
            <div class="container d-flex">
                <form action="" class="col-4 p-3"></form>
                <form action="" class="col-4 p-3"></form>
                <form action="" class="col-4 p-3">
                    <div class="mb-1">
                        <label for="costoBase" class="form-label">Subtotal</label>
                        <input class="form-control" type="text" name="costoBase" value="<?=$datosFactura->costoBase ?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="importeIva" class="form-label">I.V.A</label>
                        <input class="form-control" type="text" name="importeIva" value="<?=$datosFactura->importeIva ?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="total" class="form-label">Total</label>
                        <input class="form-control" type="text" name="total" value="<?=$datosFactura->total ?>" disabled>
                    </div><br>
                    
                </form>        
            </div>
       <?php }
    ?>
    
</body>
</html>

