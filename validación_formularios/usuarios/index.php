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
        $apellidos = depurar ($_POST["apellidos"]);
        //Expresion regular
        $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/";
        //
        if (empty($nombre)) {
            $err_vacioNombre = "el nomnbre es obligatorio";
        } else {
            if(strlen($nombre) < 30){
                if (preg_match($patron, $nombre)) {
                    echo "El nombre sigue el patron";
                } else {
                    $err_patron = "El nombre no sigue el patron";
                }
            }else{
                $err_longitudNombre = "Superado el numero max de caracteres (Nombre)";
            }
        }
    }
    //Funcion depurar
    function depurar($dato) {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
    ?>
    <form action="" method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <span class="error">
            <?php if (isset($err_vacioNombre)) echo $err_vacioNombre ?>
            <?php if (isset($err_longitudNombre)) echo $err_longitudNombre ?>
        </span>
        <p>Apellidos: <input type="text" name="apellidos"></p>
        <p>DNI: <input type="text" name="dni"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>
</body>

</html>