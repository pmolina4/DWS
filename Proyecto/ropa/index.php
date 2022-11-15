<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Ropa</title>
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
                <H1>Listado De Prendas</H1>
                <div class="row">
                    <div class="col-9">
                        <table class="table  table-striped table-hover">
                            <thead class="table-dark">
                                <tr class="table-active">
                                    <th>Nombre</th>
                                    <th>Talla</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                    <th></th>
                                    <th></th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../resources/util/databases.php';
                                //BORRAR PRENDA
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if (isset($_POST['eliminar'])) {
                                        //cogemos el identificador al que le hemos dado que seria el id que tiene en la bd
                                        $identificador = $_POST['id'];

                                        //Borrado del fichero de la carpeta 
                                        $sql2 = "SELECT imagen FROM ropa where id=$identificador";
                                        $resultado = $conexion->query($sql2);
                                        if ($resultado->num_rows > 0) {
                                            while ($row = $resultado->fetch_assoc()) {
                                                $rutaImg = $row["imagen"];
                                            }
                                        }
                                        unlink($rutaImg);

                                        //Borrado de la bd 
                                        $sql = "DELETE FROM ropa WHERE id=$identificador";
                                        if ($conexion->query($sql) == "TRUE") {
                                ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Ropa Elimida!</strong> La prenda de ropa ha sido Borrada con éxito!.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                                                <strong>Prenda no Borrada!</strong>Se ha producido un error a la hora de Borra la ropa!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                <?php
                                        }
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
                                        $nombre = $row["nombre"];
                                        $talla = $row["talla"];
                                        $precio = $row["precio"];
                                        $categoria = $row["categoria"];
                                        $imagen = $row["imagen"];
                                ?>
                                        <tr>
                                            <td><?php echo $nombre ?></td>
                                            <td><?php echo $talla ?></td>
                                            <td><?php echo $precio ?>€</td>
                                            <td><?php echo $categoria ?></td>
                                            <td>
                                                <form action="mostrar_prenda.php" method="GET">
                                                    <button class="btn btn-primary" type="submit">Ver</button>
                                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="" method="POST">
                                                    <button class="btn btn-danger" name="eliminar" type="submit">Borrar</button>
                                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                </form>
                                            </td>
                                            <td><img src="<?php echo $imagen ?>" width="50" height="50"></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="insertar_prenda.php" class="btn btn-primary">Insertar Nueva Prenda</a>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>