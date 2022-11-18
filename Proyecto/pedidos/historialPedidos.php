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
                            <?php



                            $sql_ropa = "SELECT * FROM cliente_ropa";
                            $resultado_ropa = $conexion->query($sql_ropa);
                            if ($resultado_ropa->num_rows > 0) {
                                //mientras que se obtengas filas en la row pues mostramos
                                while ($row_ropa = $resultado_ropa->fetch_assoc()) {
                                    $cliente_id = $row_ropa["cliente_id"];
                                    $ropa_id = $row_ropa["ropa_id"];
                                    $cantidad = $row_ropa["cantidad"];
                                    $fecha = $row_ropa["fecha"];
                            ?>
                                    <tr>
                                        <?php
                                        $sql_usuario = "SELECT * FROM usuarios WHERE id=$cliente_id";
                                        $resultado_usuario = $conexion->query($sql_usuario);
                                        if ($resultado_usuario->num_rows > 0) {
                                            //mientras que se obtengas filas en la row pues mostramos
                                            while ($row_usuario = $resultado_usuario->fetch_assoc()) {
                                                $usuario = $row_usuario["usuario"];
                                            }
                                        }
                                        ?>
                                        <td>
                                            <form action="./pedidos_usuario.php" method="GET">
                                                <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $cliente_id ?>">
                                                <button class="btn btn-light" type="submit"><?php echo $usuario ?></button>
                                            </form>
                                        </td>
                                        <?php
                                        $sql1 = "SELECT * FROM ropa WHERE id=$ropa_id";
                                        $resultado1 = $conexion->query($sql1);
                                        if ($resultado1->num_rows > 0) {
                                            //mientras que se obtengas filas en la row pues mostramos
                                            while ($row1 = $resultado1->fetch_assoc()) {
                                                $ropa = $row1["nombre"];
                                            }
                                        }
                                        ?>
                                        <td><?php echo $ropa ?></td>
                                        <td><?php echo $cantidad ?></td>
                                        <td><?php echo $fecha ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <a href="../index.php" class="btn btn-primary">Volver</a>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>