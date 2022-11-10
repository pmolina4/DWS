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
                        require '../util/databases.php';

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
        <a href="insertar_prenda.php" class="btn btn-primary">Insertar Nueva Prenda</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>