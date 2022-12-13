<?php 
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = 'root';
    $base_datos = 'db_paises';

    $conexion = new Mysqli($servidor, $usuario, $contrasena, $base_datos) 
        or die("Error en la conexión");
?>