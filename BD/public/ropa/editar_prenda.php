<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Editar Prenda</title>
</head>

<body>
    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Editar Prenda</h1>
        <?php

        require '../util/databases.php';
        //Recojo el id del form de mostrar prenda
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["edit"];
            //Hacemos la consulta en la bd de el producto con ese id
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
                }
            }
        }

        //REcogemos valores POST de la pagina de mostrarprenda
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id2 = $_POST["id"];


            $nombre2 = $_POST["nombre"];
            $talla2 = $_POST["talla"];
            $precio2 = $_POST["precio"];
            $categoria2 = $_POST["categoria"];


            $sql3 = "UPDATE ropa  SET  nombre = '$nombre2', 
                                        talla = '$talla2',
                                        precio = '$precio2',
                                        categoria = '$categoria2'
                                     WHERE id = '$id2'";

            if ($conexion->query($sql3) == "TRUE") {
                echo "<p>Registro modificado</p>";
                $nombre = $_POST["nombre"];
                $talla = $_POST["talla"];
                $precio = $_POST["precio"];
                $categoria = $_POST["categoria"];
            } else {
                echo "<p>Error al modificar</p>";
            }
        }



        ?>
        <div class="row">
            <div class="col-6">
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
                        <option value="camisetas">CAMISETAS</option>
                        <option value="pantalones">PANTALONES</option>
                        <option value="accesorios">ACCESORIOS</option>
                    </select>
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