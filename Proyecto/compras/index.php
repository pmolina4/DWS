<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php require '../resources/header.php' ?>

    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <div>
                <p class="list-group"></p>
                <H1>Tienda</H1>
                <div class="row">
                    <div class="col-9">
                        <table class="table  table-striped table-hover">
                            <thead class="table-dark">
                                <tr class="table-active">
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Imagen</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../resources/util/databases.php';
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $id2 = $_POST["id"];
                                    $nombre2 = $_POST["nombre"];
                                    $precio2 = $_POST["precio"];
                                    $cantidad = $_POST["cantidad"];

                                    $sql2="INSERT INTO `db_tienda_ropa`.`cliente_ropa` (`cliente_id`, `ropa_id`, `cantidad`, `fecha`) VALUES ('2', '$id2', '$cantidad','".date('Y-m-d')."')";
                                    //si la sentencia se ejecuta correctamente mostramos ok si no pues no
                                    if ($conexion->query($sql2) == "TRUE") {
                                ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Compra Realizada!</strong> La compra se ha realizado con exito!.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                                            <strong>Compra Fallida!</strong>Se ha producido un error a la hora de realizar la ompra!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <?php
                                $sql = "SELECT * FROM ropa";
                                $resultado = $conexion->query($sql);
                                //el resultado de la consulta tiene mas de 0 filas entomces..
                                if ($resultado->num_rows > 0) {
                                    //mientras que se obtengas filas en la row pues mostramos
                                    while ($row = $resultado->fetch_assoc()) {
                                        //guardamos los valores en variables
                                        $id = $row["id"];
                                        $nombre = $row["nombre"];
                                        $precio = $row["precio"];
                                        $imagen = $row["imagen"];
                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <tr>
                                                <td>
                                                    <?php echo $nombre ?>
                                                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                                                </td>
                                                <td>
                                                    <?php echo $precio ?>
                                                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                                                </td>
                                                <td>
                                                    <select name="cantidad" id="cantidad" class="form-select">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="imagen" value="<?php echo $imagen ?>">
                                                    <img src="<?php echo $imagen ?>" width="50" height="50">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                    <button class="btn btn-primary" type="submit">Comprar</button>
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