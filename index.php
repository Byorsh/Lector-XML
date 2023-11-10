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
    <h1 class="text-center">Lector de XML 4.0</h1>
    <br>
    <p class="text-center">Este es un ejercicio de lectura de xml 4.0 que almacena la informacion en una BD</p><br>
    <div class="container-fluid row">
        <form action="" class="col-4 p-3" method="POST" enctype="multipart/form-data">
            <h3 class="text-center text-secondary">Carga de archivo XML</h3>
            
            <div class="mb-3">
                <label for="archivoXML" class="form-label">Suba su archivo aqui</label>
                <input class="form-control" type="file" name="archivoXML" accept=".xml" required>
            </div>

            <button type="submit" class="btn btn-primary" name="registrarBtn" value="ok">Guardar</button>
            <?php
                
                include 'controlador/registro_xml.php';

            ?>
        </form>
        <div class="col-8 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Emisor</th>
                    <th scope="col">Receptor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">UUID</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("SELECT * FROM factura");

                    while($datos=$sql->fetch_object()){ ?>
                    <tr>
                        <td><?= $datos->id ?></td>
                        <td><?= $datos->nombreEmisor ?></td>
                        <td><?= $datos->nombreReceptor ?></td>
                        <td><?= $datos->fecha ?></td>
                        <td><?= $datos->uuid ?></td>
                        <td><?= $datos->total ?></td>
                        <td>
                            <a href="ver_factura.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
