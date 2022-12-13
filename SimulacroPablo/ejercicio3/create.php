<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--  iNSERCCION EN LA BD  -->

    <?php require 'validacion.php' ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $genero = $_POST["genero"];
        $videojuego = $_POST["videojuego"];

        if (!empty($nombre) && !empty($edad) && !empty($genero) && !empty($videojuego)) {

            $sql = "INSERT INTO personajes (nombre, edad, genero, videojuego) VALUES ('$nombre','$edad','$genero','$videojuego');";

            if ($conexion->query($sql)) {
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Personaje Insertado!</strong>El Personaje ha sido insertado con exito!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                    <strong>Personaje no insertado!</strong>Se ha producido un error a la hora de insertar el personaje!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
            }
        }else{
            ?>
                <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                    <strong>Personaje no insertado!</strong>Se ha producido un error a la hora de insertar el personaje!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
        }
    }
    ?>


    <!--  FORMULARIO  -->
    <div class="container">
        <div class="row mt-5 mx-auto justify-content-center">
            <div>
                <p class="list-group">
                <H1>Insertar Cliente</H1>
                </p>
                <div class="row">
                    <form action="" method="post">
                        <label class="form-label">Nombre: </label>
                        <input type="text" name="nombre" class="form-control">
                        <span class="error">
                            *<?php if (isset($error_nombre)) echo $error_nombre ?>
                        </span>
                        <br><br>
                        <label class="form-label">Edad: </label>
                        <input type="text" name="edad" class="form-control">
                        <span class="error">
                            *<?php if (isset($error_edad)) echo $error_edad ?>
                        </span>
                        <br><br>
                        <label class="form-label">Género: </label>
                        <select name="genero" class="form-select">
                            <option value="mujer">Mujer</option>
                            <option value="hombre">Hombre</option>
                            <option value="otro">Otro</option>
                        </select>
                        <span class="error">
                            *<?php if (isset($error_genero)) echo $error_genero ?>
                        </span>
                        <br><br>
                        <label class="form-label">Videojuego: </label>
                        <input type="text" name="videojuego" class="form-control">
                        <span class="error">
                            *<?php if (isset($error_videojuego)) echo $error_videojuego ?>
                        </span>
                        <br><br>
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </form>
                </div>

            </div>
        </div>
    </div>



</body>

</html>