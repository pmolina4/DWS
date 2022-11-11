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
    <!-- RECOGEMOS LOS DATOS PARA MOSTRARLOS -->
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
        }
    }
    ?>

    <div class="container">
        <div class="row mt-5  mx-auto justify-content-center">
            <div>
                <p class="list-group">
                <h3>Detalles De Prenda</h3>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $imagen ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $talla ?></li>
                            <li class="list-group-item"><?php echo $precio ?></li>
                            <li class="list-group-item"><?php echo $categoria ?></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-secondary">Volver</button>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>