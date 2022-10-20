<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicios</title>
</head>

<body>
    <h1>Ejercicios</h1>

    <div class="div1">
        <h2 id="ej1">Ejercicio 1</h2>
        <p>Un número primo es aquel que sólo es divisible entre sí mismo y 1. Crea un formulario que reciba dos números
            “a”
            y “b”. El formulario devolverá como respuesta los “a” primeros números primos empezando por “b”. </p>

        <form action="#ej1" method="GET">
            <input type="hidden" name="f" value="ej1">
            <label>Introduce el numero a</label>
            <input type="text" name="a">
            <label>Introduce el numero b</label>
            <input type="text" name="b"><br>
            <input type="submit" value="Mostrar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ($_GET["f"] == "ej1") {
                require 'funciones.php';
                $a = $_GET['a'];
                $b = $_GET['b'];
                $contador = $b + 1;
                do {
                    if (esPrimo($contador)) {
                        echo "$contador <br>";
                        $a = $a - 1;
                    }
                    $contador++;
                } while ($a != 0);
            }
        }
        ?>
    </div>

    <div class="div2">
        <h2 id="ej2">Ejercicio 2</h2>
        <p>Crea un formulario que compruebe si un DNI es válido. Un DNI es válido si:
            Está formado por 8 dígitos seguidos de una letra (mayúscula o minúscula)
            La letra es válida (debes de investigar cómo averiguar si la letra es válida)
            No usar expresiones regulares.
        </p>
        <form action="#ej2" method="GET">
            <label>Introduce un DNI: </label>
            <input type="text" name="dni">
            <input type="submit" value="Comprobar">
            <input type="hidden" name="f" value="ej2">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ($_GET["f"] == "ej2") {

                $dni = $_GET['dni'];
                $letra = substr($dni, -1);
                $numeros = substr($dni, 0, -1);
                if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
                    echo 'valido';
                } else {
                    echo 'no valido';
                }
            }
        }
        ?>
    </div>

    <div class="d3">
        <h2 id="ej3">Ejercicio 3</h2>
        <p>Genera de manera dinámica las tablas de multiplicar del 1 al 10. El resultado debe ser parecido al siguiente
            y estar estructurado mediante tablas HTML.
        </p>

        <?php
        echo "<table>";
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<th id="."tabla$i".">Tabla del $i </th>";
        }
        echo "</tr>";
        echo "<tr>";
        for ($j = 1; $j <= 10; $j++) {
            for ($i = 01; $i <= 10; $i++) {
                echo "<td>$i X $j =";
                echo ($i * $j);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>


</body>

</html>