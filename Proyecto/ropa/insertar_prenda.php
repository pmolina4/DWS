<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Prenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php require '../resources/header.php' ?>
    <?php require './validacion.php' ?>
    <?php
    //importamos fichero para la conexion de la bd
    require '../resources/util/databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if (isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "";
        }
        //imageness
        $file_name = $_FILES["imagen"]["name"]; //primer parametro el id del imput segundo la propoedad que queremos sacar
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../resources/ropa/" . $file_name;

        //comprobamos que los datos se han introducido en el formulario
        if (!empty($nombre) && !empty($talla) && !empty($talla) && !empty($categoria)) {
            //Comprobamos que el fichero se ha movido con éxito 
            if (move_uploaded_file($file_temp_name, $path)) {
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
            $sql = "INSERT INTO ropa (nombre, talla, precio, categoria, imagen)
                    VALUES('$nombre', '$talla','$precio','$categoria', '$path')";

            //si la sentencia se ejecuta correctamente mostramos ok si no pues no
            if ($conexion->query($sql) == "TRUE") {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Ropa Insertada!</strong> La prenda de ropa ha sido insertada con éxito!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                    <strong>Prenda no insertada!</strong>Se ha producido un error a la hora de insertar la ropa!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                <strong>Error al crear la prenda!</strong>Se ha producido un error a la hora de insertar la ropa!
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
                <H1>Insertar Prenda</H1>
                </p>
                <div class="row">
                    <div class="col-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                            <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_nombre)) echo $err_nombre ?>
                            </span>
                            <br>
                            <label class="form-label">Talla</label>
                            <select name="talla" id="talla" class="form-select">
                                <option value="" selected disabled hidden>Selecciona una talla</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_talla)) echo $err_talla ?>
                            </span>
                            <br>
                            <label class="form-label">Precio</label>
                            <input type="text" class="form-control" name="precio">
                            <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_precio)) echo $err_precio ?>
                            </span>
                            <br>
                            <label class="form-label">Categoria</label>
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="" selected default hidden>Seleccione una categoria</option>
                                <option value="CAMISETAS">CAMISETAS</option>
                                <option value="PANTALONES">PANTALONES</option>
                                <option value="ACCESORIOS">ACCESORIOS</option>
                            </select>
                            <br>
                            <label class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="imagen">
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