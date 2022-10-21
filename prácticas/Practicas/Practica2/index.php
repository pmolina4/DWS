<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Practica 2</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apelldio2 = $_POST['apellido2'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $patron_dni = "/^[0-9]{8}[a-zA-Z]$/";
        $regexp = '/^[a-z0-9]+$/i';
        $numbers = substr($dni, 0, -1);
        $letter = substr($dni, -1);
        $datos ="";
        //COmprobar DNI
        if (!empty($dni)) {
            if (
                preg_match($patron_dni, $dni) &&
                substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers % 23, 1) == $letter && strlen($letter) == 1 && strlen($numbers) == 8
            ) {
                $datos .= $dni.=" ";
            } else {
                $errorvalido = "El dni no es válido ";
            }
        } else {
            $error_dni = "El dni es obligatorio";
        }
        //Comprobar apellidos
        if (!empty($apellido1) && !empty($apelldio2) && !empty($nombre)) {
            $resultadoNombre = preg_match($regexp, $nombre);
            $resultadoApellido1 = preg_match($regexp, $apellido1);
            $resultadoApellido2 = preg_match($regexp, $apelldio2);
            if (!$resultadoNombre) {
                $errorNombre = "Nombre no válido";
            } else {
                $datos .= $nombre.= " ";
            }
            if (!$resultadoApellido1) {
                $errorApellido1 = "Apelldio no válido";
            } else {
                $datos .= $apellido1.= " ";
            }
            if (!$resultadoApellido2) {
                $errorApellido2 = "Apellido no válido";
            } else {
                $datos .= $apelldio2.= " ";
            }
        } else {
            $errorObligatorio = "Campo Obligatorio";
        }
        //Comrobar edad
        if (!empty($edad)) {
            if ($edad < 18) {
                echo '<script language="javascript">alert("No apto para menores de 18");</script>';
                $errorMenorEdad = "La edad no puede ser menor de 18";
            }
            if ($edad < 0) {
                $errornegativo = "La edad debe de ser mayor a 0";
            }
            if ($edad > 120) {
                $errorEdadmax = "La edad no puede ser superior a 120";
            }
            $datos .= $edad.=" ";
        } else {
            $errorEdad = "Campo Obligatorio";
        }
        //Comrpobar email
        $palabras = array("loco", "feo", "cabron");
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || array_contains($email, $palabras)) {
                $errorvalidarEmail = "Email no válido";
            } else {
                $datos .= $email;
            }
        } else {
            $errorEmail = "Campo Obligatorio";
        }
    }

    //funcion para comprobar si contiene una palabra
    function array_contains($str, array $arr)
    {
        foreach ($arr as $a) {
            if (str_contains($str, $a) !== false) {
                return true;
            } else {
                return false;
            }
        }
    }
    ?>
    <h1>Práctica 2</h1>
    <form action="" method="POST">
        <p>
            DNI: <input type="text" name="dni">
            <span class="error">
                *<?php if (isset($error_dni)) echo $error_dni ?>
                <?php if (isset($errorvalido)) echo $errorvalido ?>
            </span>
        </p>
        <p>
            Nombre: <input type="text" name="nombre">
            <span class="error">
                *<?php if (isset($errorObligatorio)) echo $errorObligatorio ?>
                <?php if (isset($errorNombre)) echo $errorNombre ?>
            </span>
        </p>
        <p>
            Primer Apellido: <input type="text" name="apellido1">
            <span class="error">
                *<?php if (isset($errorObligatorio)) echo $errorObligatorio ?>
                <?php if (isset($errorApellido1)) echo $errorApellido1 ?>
            </span>
        </p>
        <p>
            Segundo Apellido: <input type="text" name="apellido2">
            <span class="error">
                *<?php if (isset($errorObligatorio)) echo $errorObligatorio ?>
                <?php if (isset($errorApellido2)) echo $errorApellido2 ?>
            </span>
        </p>
        <p>
            Edad: <input type="number" name="edad">
            <span class="error">
                *<?php if (isset($errorEdad)) echo $errorEdad ?>
                <?php if (isset($errorMenorEdad)) echo $errorMenorEdad ?>
                <?php if (isset($errornegativo)) echo $errornegativo ?>
                <?php if (isset($errorEdadmax)) echo $errorEdadmax ?>

            </span>
        </p>
        <p>
            Email: <input type="text" name="email">
            <span class="error">
                *<?php if (isset($errorEmail)) echo $errorEmail ?>
                <?php if (isset($errorvalidarEmail)) echo $errorvalidarEmail ?>
            </span>
        </p>
        <label for="mensaje">Datos</label>
        <textarea name="mensaje" for="mensaje" maxlength="300">
            <?php
                if(isset($datos)) echo $datos
            ?>
        </textarea>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>