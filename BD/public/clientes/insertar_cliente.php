<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Nuevo cliente</title>
</head>

<body>
    <?php
    //importamos fichero para la conexion de la bd
    require '../util/databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST["apellido2"];
        $fechaNacimiento = $_POST['fechaN'];
        //comprobamos que los datos se han introducido en el formulario
        if (!empty($nombre) && !empty($usuario) && !empty($apellido1) && !empty($apellido2) && !empty($fechaNacimiento)) {
            //creamos la sentencia SQL
            $sql = "INSERT INTO cliente (usuario, nombre, apellido1, apellido2, fecha_nacimiento)
                    VALUES('$usuario', '$nombre','$apellido1','$apellido2','$fechaNacimiento')";
            //si la sentencia se ejecuta correctamente mostramos ok si no pues no
            if ($conexion->query($sql) == "TRUE") {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Cliente</strong> Insertado Correctamente!.
                <button type='button' class='btn-close' data-bs-dismiss='alert'aria-label='Close'></button>
              </div>";
            } else {
                echo "<p>Error al insertar</p>";
            }
        }
    }
    ?>

    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Nuevo Cliente</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>