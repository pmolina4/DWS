<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cliente</title>
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

        $sql = "SELECT * FROM cliente where id=$id";
        $resultado = $conexion->query($sql);
        //el resultado de la consulta tiene mas de 0 filas entomces..
        if ($resultado->num_rows > 0) {
            //mientras que se obtengas filas en la row pues mostramos
            while ($row = $resultado->fetch_assoc()) {
                //guardamos los valores en variables
                $id = $row["id"];
                $usuario = $row["usuario"];
                $nombre = $row["nombre"];
                $apellido1 = $row["apellido1"];
                $apellido2 = $row["apellido2"];
                $fechaNacimiento = $row["fecha_nacimiento"];
                $imagen = $row["imagen"];
            }
        }
    }

    //REcogemos valores POST de esta misma pagina del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id2 = $_POST["id"];

        //para la imagen que no se pierda
        $sql2 = "SELECT imagen FROM cliente where id=$id2";
        $resultado2 = $conexion->query($sql2);
        if ($resultado2->num_rows > 0) {
            //mientras que se obtengas filas en la row pues mostramos
            while ($row2 = $resultado2->fetch_assoc()) {
                $imagen = $row2["imagen"];
            }
        }

        //datos del form
        $usuario2 = $_POST["usuario"];
        $nombre2 = $_POST["nombre"];
        $apellido12 = $_POST["apellido1"];
        $apellido22 = $_POST["apellido2"];
        $fechaNacimiento2 = $_POST["fechaN"];

        //Para el update
        $sql3 = "UPDATE cliente  SET  usuario = '$usuario2', 
                                    nombre = '$nombre2',
                                    apellido1 = '$apellido12',
                                    apellido2 = '$apellido22',
                                    fecha_nacimiento = '$fechaNacimiento2'
                                 WHERE id = '$id2'";

        if ($conexion->query($sql3) == "TRUE") {
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $fechaNacimiento = $_POST["fechaN"];
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
                <h3>Detalles De Cliente</h3>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $imagen ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $usuario ?></li>
                            <li class="list-group-item"><?php echo $nombre ." ". $apellido1 ." ".  $apellido2 ?></li>
                            <li class="list-group-item"><?php echo $fechaNacimiento ?></li>
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
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo$usuario ?>">
                    <br>
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo$nombre ?>">
                    <br>
                    <label class="form-label">Apellido 1</label>
                    <input type="text" class="form-control" name="apellido1" value="<?php echo$apellido1 ?>">
                    <br>
                    <label class="form-label">Apellido 2</label>
                    <input type="text" class="form-control" name="apellido2" value="<?php echo$apellido2 ?>">
                    <br>
                    <label class="form-label">Fecha Nacimiento</label>
                    <input type="date" class=" form-control sm-form-control" name="fechaN" value="<?php echo$fechaNacimiento ?>">
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