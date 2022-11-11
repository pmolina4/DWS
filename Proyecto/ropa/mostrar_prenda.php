<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Prenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php require '../resources/header.php' ?>

    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <div>
                <p class="list-group">
                <H1>Listado De Prendas</H1>
                </p>
                <div class="row">
            <div class="col-9">
                <table class="table  table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="table-active">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../resources/util/databases.php';

                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            $id = $_GET["id"];
                        }

                        $sql = "SELECT * FROM ropa where id=$id";
                        $resultado = $conexion->query($sql);
                        //el resultado de la consulta tiene mas de 0 filas entomces..
                        if ($resultado->num_rows > 0) {
                            //mientras que se obtengas filas en la row pues mostramos
                            while ($row = $resultado->fetch_assoc()) {
                                //guardamos los valores en variables
                                $id = $row["id"];
                                $nombre = $row["nombre"];
                                $talla = $row["talla"];
                                $precio = $row["precio"];
                                $categoria = $row["categoria"];
                                $imagen = $row["imagen"];
                        ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $talla ?></td>
                                    <td><?php echo $precio ?></td>
                                    <td><?php echo $categoria ?></td>
                                    <td><img src="<?php echo $imagen ?>" width="50" height="50" class="zoom"></td>
                                    <td>
                                        <form action="index.php" method="get">
                                            <button class="btn btn-primary" type="submit">Volver</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="editar_prenda.php" method="GET">
                                            <button class="btn btn-primary" type="submit" name="edit" value="<?php echo $row["id"] ?>">Editar</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>