<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>CLientes</title>
</head>

<body>
    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Listado de Clientes</h1>
        <div class="row">
            <div class="col-9">
                <table class="table  table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="table-active">
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Fecha Nacimiento</th>
                            <th>Avatar</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../util/databases.php';

                        //BORRADO DE LA BD Y DEL FICHERO
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['eliminar'])) {
                                $identificador = $_POST['id'];

                                //Borrado del fichero de la carpeta 
                                $sql2 = "SELECT imagen FROM CLIENTE where id=$identificador";
                                $resultado = $conexion->query($sql2);
                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {
                                        $rutaImg = $row["imagen"];
                                    }
                                }
                                if (!$rutaImg = "../resources/cliente/avatarDefecto.png") {
                                    unlink($rutaImg);
                                }

                                //Borrado de la bd 
                                $sql = "DELETE FROM CLIENTE WHERE id=$identificador";
                                if ($conexion->query($sql) == "TRUE") {
                                    echo "<p>Prenda eliminada</p>";
                                } else {
                                    echo "<p>Error al elimiar</p>";
                                }
                            }
                        }



                        $sql = "SELECT * FROM cliente";
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
                                $fechaNacimeinto = $row["fecha_nacimiento"];
                                $avatar = $row["imagen"];
                        ?>
                                <tr>
                                    <td><?php echo $usuario ?></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $apellido1 ?></td>
                                    <td><?php echo $apellido2 ?></td>
                                    <td><?php echo $fechaNacimeinto ?></td>
                                    <td><img src="<?php echo $avatar ?>" width="50" height="50"></td>
                                    <td>
                                        <form action="" method="POST">
                                            <button class="btn btn-danger" name="eliminar" type="submit">Borrar</button>
                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="editar_cliente.php" method="get">
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
        <a href="insertar_cliente.php" class="btn btn-primary">Insertar Nuevo Cliente</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>