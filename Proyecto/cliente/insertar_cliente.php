<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php require '../resources/header.php' ?>
    <?php
    //importamos fichero para la conexion de la bd
    require '../resources/util/databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //imageness
        $file_name = $_FILES["avatar"]["name"]; //primer parametro el id del imput segundo la propoedad que queremos sacar
        $file_temp_name = $_FILES["avatar"]["tmp_name"];

        if (empty($file_name)) {
            $path = "../resources/cliente/avatarDefecto.png";
        } else {
            $path = "../resources/cliente/" . $file_name;
        }

        //Resto del fomulario
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $fechaNacimiento = $_POST["fechaN"];



        //comprobamos que los datos se han introducido en el formulario
        if (!empty($usuario) && !empty($nombre) && !empty($apellido1) && !empty($apellido2) && !empty($fechaNacimiento)) {
            //Comprobamos que el fichero se ha movido con éxito 
            if (move_uploaded_file($file_temp_name, $path) || $path == '../resources/cliente/avatarDefecto.png') {
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Imagen Movida!</strong> Imagen movida a la carpeta local!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Imagen No movida a la carpeta local!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }

            //creamos la sentencia SQL
            $sql = "INSERT INTO cliente (usuario, nombre, apellido1, apellido2, fecha_nacimiento, imagen)
                    VALUES('$usuario', '$nombre','$apellido1','$apellido2', '$fechaNacimiento', '$path')";

            //si la sentencia se ejecuta correctamente mostramos ok si no pues no
            if ($conexion->query($sql) == "TRUE") {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cliente Insertado!</strong>El clinete ha sido insertado con exito!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                    <strong>Cliente no insertado!</strong>Se ha producido un error a la hora de insertar el cliente!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                <strong>Error al crear el cliente!</strong>Se ha producido un error a la hora de insertar el cliente!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>
    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <div>
                <p class="list-group">
                <H1>Insertar Cliente</H1>
                </p>
                <div class="row">
                    <div class="col-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Avatar</label>
                            <input type="file" class="form-control" name="avatar">
                            <br>
                            <label class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario">
                            <br>
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                            <br>
                            <label class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" name="apellido1">
                            <br>
                            <label class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" name="apellido2">
                            <br>
                            <label class="form-label">Fecha Nacimiento</label>
                            <input type="date" class=" form-control sm-form-control" name="fechaN">
                            <br>
                            <button class="btn btn-primary" type="submit">Crear</button>
                            <a class="btn btn-secondary" href="index.php">Volver</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>