<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php require 'database.php' ?>

    <!-- BORRADO DE PAIS DE LA BD -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["id"];

        $sql_eliminar = "DELETE FROM paises WHERE id = '$id';";

        $conexion->query($sql_eliminar);
    }
    ?>

    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <p class="list-group">
            <H1>Listado De Paises</H1>
            </p>
            <div class="row">
                <table class="table  table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="table-active">
                            <th>País</th>
                            <th>Continente</th>
                            <th>Población</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM paises";
                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["pais"] ?></td>
                                <td><?php echo $row["continente"] ?></td>
                                <td><?php echo $row["poblacion"] ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <button class="btn btn-danger" name="eliminar" type="submit">Borrar</button>
                                        <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "No se han encontrado películas";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>