<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styleForm.css">
    
    <title>Form</title>
</head>

<body>
    <?php require '../validacion.php' ?>

    <div class="signupFrm">
        <div class="wrapper">
            <form action="" class="form" method="POST">
                <h1 class="title">Formulario</h1>

                <div class="inputContainer">
                    <input type="text" name="nombre" class="input" placeholder="Nombre">
                    <label class="label">Nombre</label>
                </div>
                <span class="error">
                    *<?php if (isset($error_nombre)) echo $error_nombre ?>
                </span>
                <br>
                <br>
                <div class="inputContainer">
                    <input type="text" name="edad" class="input" placeholder="edad">
                    <label for="" class="label">Edad</label>
                </div>
                <span class="error">
                    *<?php if (isset($error_edad)) echo $error_edad ?>
                </span>
                <br>
                <br>
                <div class="inputContainer">
                    <select name="genero">
                        <option value="" selected disabled hidden>-- Selecciona el género --</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="otro">Otro</option>
                    </select>
                    <label for="">Genero</label>
                </div>
                <span class="error">
                    *<?php if (isset($error_genero)) echo $error_genero ?>
                </span>
                <br>
                <br>
                <div class="inputContainer">
                    <input type="text" class="input" name="videojuego" placeholder="">
                    <label for="" class="label">Videojuego</label>
                </div>
                <span class="error">
                    *<?php if (isset($error_videojuego)) echo $error_videojuego ?>
                </span>
                <br>
                <br>
                <input type="submit" class="submitBtn" value="Sign up">
            </form>
        </div>
    </div>
</body>

</html>