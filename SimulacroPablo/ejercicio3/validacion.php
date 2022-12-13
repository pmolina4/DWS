<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp_nombre = $_POST["nombre"];
    $temp_videojuego = $_POST["videojuego"];
    $temp_edad = $_POST["edad"];
    //VALIDACION GENERO
    if (empty($_POST["genero"])) {

        $error_genero = "No se ha introducido genero";
    } else {

        $genero = $_POST["genero"];
    }

    //VALIDACION NOMBRE 
    if (empty($temp_nombre)) {

        $error_nombre = "El nombre no puede estar vacio";
    } else {
        //expresion regular
        $pattern = "/^[A-Za-z 0-9]+$/";

        if (!preg_match($pattern, $temp_nombre)) {

            $error_nombre = "El nombre no puede contener caracteres especiales, solo letras, espacios y numeros.";
        } else {

            $nombre = $temp_nombre;
        }
    }


    //VALIDACION VIDEOJUEGO
    if (empty($temp_videojuego)) {

        $error_videojuego = "El videojuego no puede estar vacio";
    } else {

        $pattern = "/^[A-Za-z 0-9]+$/";

        if (!preg_match($pattern, $temp_videojuego)) {

            $error_videojuego = "El videojuego no puede contener caracteres especiales, solo letras, espacios y numeros.";
        } else {

            $videojuego = $temp_videojuego;
        }
    }


    //VALIDACION EDAD
    if (empty($temp_edad)) {

        $error_edad = "La edad no puede estar vacia";
    } else {

        $pattern = "/^[0-9]+$/";

        if (!preg_match($pattern, $temp_edad)) {

            $error_edad = "La edad tiene que ser un numero";
        } else {

            if ($temp_edad > 0) {

                $edad = $temp_edad;
            } else {

                $error_edad = "La edad tiene que ser mayor que cero";
            }
        }
    }



}
