<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php require 'validacion.php' ?>
    <div>
        <form action="" method="post">
            <label>Nombre: </label>
            <input type="text" name="nombre" class="field">
            <span class="error">
                *<?php if (isset($error_nombre)) echo $error_nombre ?>
            </span>
            <br><br>
            <label>Edad: </label>
            <input type="text" name="edad" class="field">
            <span class="error">
                *<?php if (isset($error_edad)) echo $error_edad ?>
            </span>
            <br><br>
            <label>Género: </label>
            <select name="genero">
                <option value="" selected disabled hidden>-- Selecciona el género --</option>
                <option value="mujer">Mujer</option>
                <option value="hombre">Hombre</option>
                <option value="otro">Otro</option>
            </select>
            <br>
            <span class="error">
                *<?php if (isset($error_genero)) echo $error_genero ?>
            </span>
            <br><br>
            <label>Videojuego: </label>
            <input type="text" name="videojuego" class="field">
            <span class="error">
                *<?php if (isset($error_videojuego)) echo $error_videojuego ?>
            </span>
            <br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>

</body>

</html>