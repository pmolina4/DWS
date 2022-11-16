<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = 'root';
    $base_de_datos = 'db_usuarios';


    
    //MySQLi

    //creamos la variable con la conexion a la bd 
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos) or die("Error en la conexion");
    

?>