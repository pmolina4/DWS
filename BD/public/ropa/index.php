<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Listado de prendas</h1>
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
                        require '../util/databases.php';
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
                                    echo "<p>Prenda eliminada</p>";
                                } else {
                                    echo "<p>Error al elimiar</p>";
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
                                    <td><?php echo $precio ?></td>
                                    <!-- Pasamos por url la categoria -->
                                    <td><?php echo "<a href=filtrado_ropa.php?cat=$categoria> $categoria</a>" ?></td>
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
                                    <td><img src="<?php echo $imagen?>" width="50" height="50"></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>