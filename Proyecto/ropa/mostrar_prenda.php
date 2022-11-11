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
    }

    //REcogemos valores POST de esta misma pagina del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id2 = $_POST["id"];


       
        //para la imagen que no se pierda
        $sql2 = "SELECT imagen FROM ropa where id=$id2";
        $resultado2 = $conexion->query($sql2);
        if ($resultado2->num_rows > 0) {
            //mientras que se obtengas filas en la row pues mostramos
            while ($row2 = $resultado2->fetch_assoc()) {
                $imagen = $row2["imagen"];
            }
        }

        //datos del form
        $nombre2 = $_POST["nombre"];
        $talla2 = $_POST["talla"];
        $precio2 = $_POST["precio"];
        $categoria2 = $_POST["categoria"];

        //Para el update
        $sql3 = "UPDATE ropa  SET  nombre = '$nombre2', 
                                    talla = '$talla2',
                                    precio = '$precio2',
                                    categoria = '$categoria2'
                                 WHERE id = '$id2'";

        if ($conexion->query($sql3) == "TRUE") {
            $nombre = $_POST["nombre"];
            $talla = $_POST["talla"];
            $precio = $_POST["precio"];
            $categoria = $_POST["categoria"];
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Ropa Modificada!</strong> La prenda de ropa ha sido Modificada con éxito!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                <strong>Modificación Erronea!</strong>Se ha producido un error a la hora de modificar la ropa!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }

    ?>

    <div class="container">
        <div class="row mt-5 ">
            <div class="col-4">
                <p class="list-group">
                <h3>Detalles De Prenda</h3>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $imagen ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $talla ?></li>
                            <li class="list-group-item"><?php echo $precio ?>€</li>
                            <li class="list-group-item"><?php echo $categoria ?></li>
                        </ul>
                    </div>
                    <div class="card-body mx-auto">
                        <form action="" method="POST">
                            <button type="button" class="btn btn-primary" data-bs-target="#form" data-bs-toggle="collapse">Editar</button>
                            <a class="btn btn-secondary" href="index.php">Volver</a>
                        </form>
                    </div>
                </div>
                </p>
            </div>

            <div class="collapse col-8" id="form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>">
                    <br>
                    <label class="form-label">Talla</label>
                    <select name="talla" id="talla" class="form-select">
                        <option value="<?php echo $talla ?>" selected><?php echo $talla ?></option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <br>
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" value="<?php echo $precio ?>">
                    <br>
                    <label class="form-label">Categoria</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option value="<?php echo $categoria ?>" selected default><?php echo $categoria ?></option>
                        <option value="CAMISETAS">CAMISETAS</option>
                        <option value="PANTALONES">PANTALONES</option>
                        <option value="ACCESORIOS">ACCESORIOS</option>
                    </select>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>