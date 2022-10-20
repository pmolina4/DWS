<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = depurar($_POST["nombre"]);
        $apellidos = depurar($_POST["apellidos"]);
        $dni = depurar($_POST["dni"]);
        $email = depurar($_POST["email"]);
        $fechaNaciemitno = depurar($_POST["fechaNacimiento"]);
        //Comprobamos que el nombre no esté vacío 
        if (empty($nombre)) {
            $err_vacioNombre = "El nomnbre es obligatorio";
            $nombre = "";
        } else {
            //Comrpobamos que el nombre tenga una longitud menos a 30 caracteres
            if (strlen($nombre) < 30) {
                //Expresion regular
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/";
                //Comprobamos que el nombre cumple con la expresión regular
                if (preg_match($patron, $nombre)) {
                    echo "El nombre sigue el patron";
                } else {
                    $err_patron = "El nombre no sigue el patron";
                }
            } else {
                $err_longitudNombre = "Superado el numero max de caracteres (30)";
            }
        }
        //Comprobamos que el apellidos no esté vacío 
        if (empty($apellidos)) {
            $err_vacioApellidos = "El Apellido es obligatorio";
            $apellidos = "";
        } else {
            //Comrpobamos que los apellidos tenga una longitud menos a 60 caracteres
            if (strlen($apellidos) < 60) {
                //Expresion regular
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
                //Comprobamos que el apellido cumple con la expresión regular
                if (preg_match($patron, $apellidos)) {
                    echo "El Apellido sigue el patron";
                } else {
                    $err_patron = "El Apellido no sigue el patron";
                }
            } else {
                $err_longitudApellidos = "Superado el numero max de caracteres (60)";
            }
        }

        //Comprobamos que el DNI no esté vacío 
        if (empty($dni)) {
            $err_vacioDNI = "El DNI es obligatorio";
        } else {
            $patron_dni = "/^[0-9]{8}[a-zA-Z]$/";
            if (preg_match($patron_dni, $dni)) {
                echo "El DNI es válido";
            } else {
                $err_patronDNI = "El dni no es válido";
            }
        }

        //Comprobamos que el email no esté vacío
        if (empty($email)) {
            $errorEmail = "El email es obligatorio";
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "El correo es correcto";
            } else {
                $error_valid_email = "Email no válido";
            }
        }

        //Comprobamos que la fecha no es vacía
        if (empty($fechaNaciemitno)) {
            $errorFecha = "La fecha es obligatoria";
        }else{
            $patron_fecha = "/^[0-3][0-9]\/[0-1][0-9]\/(19|20)[0-9]{2}$/";
            if (preg_match($patron_fecha, $fechaNaciemitno)) {
                echo "Fecha válida";
            } else {
                $err_patronFecha = "La fecha no es válida";
            }
        }
    }

    if (isset($nombre) && isset($apellidos) && isset($dni)) {
        echo "<p>$nombre</p>";
        echo "<p>$apellidos</p>";
        echo "<p>$dni</p>";
    }


    //Funcion depurar
    function depurar($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
    ?>
    <form action="" method="POST">
        <p>Nombre: <input type="text" name="nombre">
            <span class="error">
                *<?php if (isset($err_vacioNombre)) echo $err_vacioNombre ?>
                <?php if (isset($err_longitudNombre)) echo $err_longitudNombre ?>
            </span>
        </p>
        <p>Apellidos: <input type="text" name="apellidos">
            <span class="error">
                *<?php if (isset($err_vacioApellidos)) echo $err_vacioApellidos ?>
                <?php if (isset($err_longitudApellidos)) echo $err_longitudApellidos ?>
            </span>
        </p>
        <p>DNI: <input type="text" name="dni">
            <span class="error">
                *<?php if (isset($err_vacioDNI)) echo $err_vacioDNI ?>
                <?php if (isset($err_patronDNI)) echo $err_patronDNI ?>
            </span>
        </p>
        <p>
            Email: <input type="text" name="email">
            <span class="error">
                *<?php if (isset($error_valid_email)) echo $error_valid_email ?>
                <?php if (isset($errorEmail)) echo $errorEmail ?>
            </span>
        </p>
        <p>
            Fecha Nacimiento: <input type="text" name="fechaNacimiento">
            <span class="error">
                *<?php if (isset($err_patronFecha)) echo $err_patronFecha ?>
                <?php if (isset($errorFecha)) echo $errorFecha ?>
            </span>
        </p>
        <p><input type="submit" value="Enviar"></p>
    </form>
</body>

</html>