<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php require '../resources/header.php' ?>
    <?php require '../resources/util/databases.php'; ?>

    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <div>
                <p class="list-group"></p>
                <H1>Pedidos</H1>
                <div class="row">
                    <div class="col-9">
                        <table class="table  table-striped table-hover">
                            <thead class="table-dark">
                                <tr class="table-active">
                                    <th>Usuario</th>
                                    <th>Ropa</th>
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //BUSCAR EL ID DEL USUARIO LOGEADO
                                $usu = $_SESSION["usuario"];
                                $sql3 = "SELECT * FROM usuarios where usuario= '$usu'";
                                $resultado3 = $conexion->query($sql3);
                                if ($resultado3->num_rows > 0) {
                                    while ($row3 = $resultado3->fetch_assoc()) {
                                        $id3 = $row3["id"];
                                    }
                                }
                                ?>

                                <?php
                                $sql = "SELECT * FROM db_tienda_ropa.cliente_ropa WHERE cliente_id = $id3";
                                $resultado = $conexion->query($sql);
                                //el resultado de la consulta tiene mas de 0 filas entomces..
                                if ($resultado->num_rows > 0) {
                                    //mientras que se obtengas filas en la row pues mostramos
                                    while ($row = $resultado->fetch_assoc()) {
                                        //guardamos los valores en variables
                                        $ropaid = $row["ropa_id"];
                                        $cantidad = $row["cantidad"];
                                        $fecha = $row["fecha"];

                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <tr>
                                                <td>
                                                    <?php echo $id3 ?>
                                                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                                                </td>
                                                <td>
                                                    <?php echo $ropaid ?>
                                                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                                                </td>
                                                <td>
                                                    <?php echo $fecha ?>
                                                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                                                </td>
                                                <td>
                                                    <?php echo $cantidad ?>
                                                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                                                </td>
                                                
                                            </tr>
                                        </form>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="../index.php" class="btn btn-primary">Volver</a>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>