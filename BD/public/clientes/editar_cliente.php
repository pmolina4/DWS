<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Editar Cliente</title>
</head>

<body>
    <?php
    require '../util/databases.php';
    //Recojo el id del form de mostrar cliente
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["edit"];
        //Hacemos la consulta en la bd de el producto con ese id
        $sql = "SELECT * FROM cliente where id=$id";
        $resultado = $conexion->query($sql);
        //el resultado de la consulta tiene mas de 0 filas entomces..
        if ($resultado->num_rows > 0) {
            //mientras que se obtengas filas en la row pues mostramos
            while ($row = $resultado->fetch_assoc()) {
                //guardamos los valores en variables
                $usuario = $row["usuario"];
                $nombre = $row["nombre"];
                $apellido1 = $row["apellido1"];
                $apellido2 = $row["apellido2"];
                $fecha_nacimiento = $row["fecha_nacimiento"];
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id2 = $_POST["id"];

        $usuario2 = $_POST["usuario"];
        $nombre2 = $_POST["nombre"];
        $apellido12 = $_POST["apellido1"];
        $apellido22 = $_POST["apellido2"];
        $fecha_nacimiento2 = $_POST["fechaN"];


        $sql2 = "UPDATE cliente  SET  usuario = '$usuario2', 
                                    nombre = '$nombre2',
                                    apellido1 = '$apellido12',
                                    apellido2 = '$apellido22',
                                    fecha_nacimiento = '$fecha_nacimiento2'
                                WHERE id = '$id2'";

        if ($conexion->query($sql2) == "TRUE") {
            echo "<p>Registro modificado</p>";
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $fecha_nacimiento = $_POST["fechaN"];
        } else {
            echo "<p>Error al modificar</p>";
        }
    }

    ?>
    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Nuevo Cliente</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $usuario ?>">
                    <br>
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>">
                    <br>
                    <label class="form-label">Apellido 1</label>
                    <input type="text" class="form-control" name="apellido1" value="<?php echo $apellido1 ?>">
                    <br>
                    <label class="form-label">Apellido 2</label>
                    <input type="text" class="form-control" name="apellido2" value="<?php echo $apellido2 ?>">
                    <br>
                    <label class="form-label">Fecha Nacimiento</label>
                    <input type="date" class=" form-control sm-form-control" name="fechaN" value="<?php echo $fecha_nacimiento ?>">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Modificar</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>