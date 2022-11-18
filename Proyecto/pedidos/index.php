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
                                    <th>Facturas</th>
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

                                $sql_usuario = "SELECT * FROM usuarios WHERE id=$id3";
                                $resultado_usuario = $conexion->query($sql_usuario);
                                if ($resultado_usuario->num_rows > 0) {
                                    //mientras que se obtengas filas en la row pues mostramos
                                    while ($row_usuario = $resultado_usuario->fetch_assoc()) {
                                        $usuario = $row_usuario["usuario"];
                                    }
                                }


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

                                        <form action="../factura/invoice.php" target="_blank" method="POST">
                                            <tr>
                                                <td>
                                                    <?php echo $usuario ?>
                                                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                                                </td>
                                                <?php
                                                $sql_ropa = "SELECT * FROM ropa WHERE id=$ropaid";
                                                $resultado_ropa = $conexion->query($sql_ropa);
                                                if ($resultado_ropa->num_rows > 0) {
                                                    //mientras que se obtengas filas en la row pues mostramos
                                                    while ($row_ropa = $resultado_ropa->fetch_assoc()) {
                                                        $ropa = $row_ropa["nombre"];
                                                        $imagen_ropa = $row_ropa["imagen"];
                                                        $precio = $row_ropa["precio"];
                                                    }
                                                }
                                                ?>
                                                <td>
                                                    <?php echo $ropa ?>
                                                    <input type="hidden" name="ropa" value="<?php echo $ropa ?>">
                                                </td>
                                                <td>
                                                    <?php echo $fecha ?>
                                                    <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
                                                </td>
                                                <td>
                                                    <?php echo $cantidad ?>
                                                    <input type="hidden" name="cantidad" value="<?php echo $cantidad ?>">
                                                </td>
                                                <td>
                                                        <button class="btn btn-success" type="submit">Ver Factura</button>
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