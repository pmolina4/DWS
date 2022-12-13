<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php

use Hamcrest\Type\IsNumeric;

 require 'validacion.php' ?>
<!--  ERRO EN LA EXPRESION REGULAR-->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $videojuego = $_POST["videojuego"];
        $edad = $_POST["edad"];
        if (isset($_POST["genero"])) {
            $genero= $_POST["genero"];
        }else{
            $genero ="" ;
        }

        $patron ="/^[a-z0-9\\-\\#]+\S+$/";

        //COMPROBACION NOMBRE
        if (empty($nombre)) {
            $error_vacioNombre = "El nombre es obligatorio";
        }
        if (!preg_match($patron, $nombre)) {
            $err_patron = "El nombre no sigue el patron";
        }

        //COMPROBACION VIDEOJUEGO
        if (!preg_match($patron, $videojuego)) {
            $err_patron = "El nombre no sigue el patron";
        }
        if (empty($videojuego)) {
            $error_vacioVideojuego = "El videojuego es obligatorio";
        }

        //COMPROBACION EDAD
        if (!is_numeric($edad)) {
            $error_noNumeric = "La edad debe ser un numero";
        }
        if (empty($edad)) {
            $error_vacioEdad = "La edad es obligatoria";
        }
        if ($edad <=0) {
            $err_patronEdad = "La edad tiene que ser mayor que 0";
        }

        //COMPROBACION GENERO
        if (empty($genero)) {
            $error_vacioGenero = "El genero  es obligatoria";
        }
    }
    ?>

    <form action="" method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre">
        <span class="error">
            *<?php if (isset($error_vacioNombre)) echo $error_vacioNombre ?>
            <?php if (isset($err_patron)) echo $err_patron ?>
        </span>
        <br><br>
        <label>Edad: </label>
        <input type="text" name="edad">
        <span class="error">
            *<?php if (isset($error_vacioEdad)) echo $error_vacioEdad ?>
            <?php if (isset($err_patronEdad)) echo $err_patronEdad ?>
            <?php if (isset($error_noNumeric)) echo $error_noNumeric ?>
        </span>
        <br><br>
        <label>Género: </label>
        <select name="genero">
            <option value="" selected disabled hidden>-- Selecciona el género --</option>
            <option value="mujer">Mujer</option>
            <option value="hombre">Hombre</option>
            <option value="otro">Otro</option>
        </select>
        <span class="error">
            *<?php if (isset($error_vacioGenero)) echo $error_vacioGenero ?>
        </span>
        <br><br>
        <label>Videojuego: </label>
        <input type="text" name="videojuego">
        <span class="error">
            *<?php if (isset($error_vacioVideojuego)) echo $error_vacioVideojuego ?>
        </span>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>