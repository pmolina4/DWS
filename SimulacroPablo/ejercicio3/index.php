<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php require 'database.php' ?>
    <?php require 'create.php' ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <table class="table  table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="table-active">
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th>Videojuego</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM personajes ORDER BY nombre,videojuego";
                    $resultado = $conexion->query($sql);
                    //el resultado de la consulta tiene mas de 0 filas entomces..
                    if ($resultado->num_rows > 0) {
                        //mientras que se obtengas filas en la row pues mostramos
                        while ($row = $resultado->fetch_assoc()) {
                            //guardamos los valores en variables
                            $nombre = $row["nombre"];
                            $edad = $row["edad"];
                            $genero = $row["genero"];
                            $videojuego = $row["videojuego"];

                    ?>
                            <tr>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $edad ?></td>
                                <td><?php echo $genero ?></td>
                                <td><?php echo $videojuego ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>