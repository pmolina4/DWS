<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp_nombre = $_POST["nombre"];
    
    if (empty($temp_nombre)) {
        $err_nombre = "El Nombre es obligatorio";
    } else {
        if (strlen($temp_nombre) > 80) {
            $err_nombre = "El Nombre no puede tener más de 80 caracteres";
        } else {
            $nombre = $_POST["nombre"];
        }
    }

    $temp_precio = $_POST["precio"];
    if (empty($temp_precio)) {
        $err_precio = "El precio es obligatorio";
    } else {
        if ($temp_precio < 0) {
            $err_precio = "El precio no puede ser inderior a 0€";
        } else {
            $precio = $_POST["precio"];
        }
    }

    if (isset($_POST["talla"])) {
        $talla = $_POST["talla"];
    } else {
        $err_talla = "Selecciona una talla";
    }

}




?>
