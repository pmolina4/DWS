<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ejercicio1</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <!--EJERCICIO 1-->
    <?php
    $numeros = [];
    //rellenamos el array con los numeros
    for ($i = 0; $i <= 50; $i += 2) {
        $numeros[$i] = $i;
    }
    //barahjamos el array
    shuffle($numeros);
    //ordenamos el array en orden descendente
    rsort($numeros);
    print_r($numeros);
    ?>
    <!--EJERCICIO 2-->
    <br><br>
    <h1>Ejercicio 2</h1>
    <?php
    $numeros_random = [];
    //rellenamos el array con los numeros random
    for ($i = 0; $i <= 10; $i++) {
        $numeros_random[$i] = rand(0, 100);
    }
    //ordenado ascendente
    asort($numeros_random);
    print_r($numeros_random);
    //ordenado descendente
    arsort($numeros_random);
    print_r($numeros_random);
    ?>
    <!-- EJERCICIO 3 -->
    <br><br>
    <h1>Ejercicio 3</h1>
    <table>
        <tr>
            <th>País</th>
            <th>Ciudad</th>
        </tr>
        <?php
        $paises = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw");
        //ordenamos por paises
        asort($paises);
        foreach ($paises as $pais => $ciudad) {
            echo "<tr>";
            echo "<td>" . $pais . "</td>";
            echo "<td>" . $ciudad . "</td>";
            echo "<tr>";
        }
        ?>
    </table>

    <!--EJERCICIO 4-->
    <br><br>
    <h1>Ejercicio 4</h1>
    <?php
    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fornite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Street Fighter", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55]
    ];
    ?>
    <h3>Tabla normal</h3>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach ($juegos as $juego) {
            list($nombre, $consola, $precio) = $juego;
        ?>
            <tr>
                <td><?php echo $nombre . "<br>"; ?></td>
                <td><?php echo $consola . "<br>"; ?></td>
                <td><?php echo $precio . "<br><br>"; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h3>Tabla ordenado por precio</h3>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
        </tr>
        <?php
        $precio = array_column($juegos, 2);
        array_multisort($precio, SORT_DESC, $juegos);
        foreach ($juegos as $juego) {
            list($nombre, $consola, $precio) = $juego;
        ?>
            <tr>
                <td><?php echo $nombre . "<br>"; ?></td>
                <td><?php echo $consola . "<br>"; ?></td>
                <td><?php echo $precio . "<br><br>"; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h3>Tabla ordenado por consola</h3>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
        </tr>
        <?php
        $precio = array_column($juegos, 1);
        array_multisort($precio, SORT_DESC, $juegos);
        foreach ($juegos as $juego) {
            list($nombre, $consola, $precio) = $juego;
        ?>
            <tr>
                <td><?php echo $nombre . "<br>"; ?></td>
                <td><?php echo $consola . "<br>"; ?></td>
                <td><?php echo $precio . "<br><br>"; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>


    <!--EJERCICIO 5-->
    <br><br>
    <h1>Ejercicio 5</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Nota</th>
            <th>Calificacion</th>
        </tr>
        <?php
        require 'function_calificacion.php';
        $estudiantes = [
            ["Pablo", rand(0, 10)],
            ["Lorenzo", rand(0, 10)],
            ["Alavaro", rand(0, 10)],
            ["Eric", rand(0, 10)],
            ["Juan", rand(0, 10)]
        ];
        asort($estudiantes); //ordenamos el array alfabético
        foreach ($estudiantes as $estudiante) {
            list($nombre, $nota) = $estudiante;
        ?>
            <tr>
                <td><?php echo $nombre ?></td>
                <td><?php echo $nota ?></td>
                <td><?php echo Calificacion($nota) ?></td>
            </tr>
        <?php
        }

        ?>
    </table>
</body>

</html>