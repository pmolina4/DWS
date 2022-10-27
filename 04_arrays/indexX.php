<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Arrays</title>
</head>

<body>
    <?php

    $series = [
        'El juego del calamar',
        'La casa de papel',
        'Alice in borderland',
        'The Witcher'
    ];
    //  Inserta elementos al final del array
    array_push($series, "Cuéntame", "Dark");

    $series[] = "Big Bang Theory";

    $series[10] = "La que se avecina";

    array_push($series, "Haikyuu");

    $series[10] = "Aquí no hay quien viva";

    unset($series[10]);

    $series = array_values($series);

    foreach ($series as $indice => $serie) {
        echo $indice . " => " . $serie . "<br>";
    }

    /*  MEDIANTE FOR EACH, MOSTRAR TODAS LAS PERSONAS
            Y SUS DNI EN UNA TABLA
        */

    echo "<br><br>";

    //  Array Personas
    $personas = [
        "23242627F" => "Albertiño",
        "95542627T" => "Armando",
        "87234455G" => "Pepe"
    ];

    $personas["12345678D"] = "Rodolfo";

    $personas["87234455G"] = "Ruperto";

    unset($personas["23242627F"]);

    //$personas = array_values($personas);

    //--------ORDENAR ARRAY---------//
    //ordenar por nombre
    asort($personas);
    //Ordenar por dni al reves
    krsort($personas);


    echo "<table>";
    echo "<tr>";
    echo "<th>DNI</th>";
    echo "<th>Nombre</th>";
    echo "</tr>";
    foreach ($personas as $dni => $nombre) {
        echo "<tr>";
        echo "<td>" . $dni . "</td>";
        echo "<td>" . $nombre . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<br><br>";

    echo "Hay " . count($personas) . " personas";
    ?>

    <!-- Bucle for para las series -->
    <!--Ordenar las personas por dni de mayor a menos -->
    <!--Ordenar las personas por nombre en orden alfabetico inverso -->
    <h3>Lista Series</h3>
    <ul>
        <?php
        for ($i = 0; $i < count($series); $i++) {
        ?>
            <li><?php echo $series[$i] ?></li>
        <?php
        }
        ?>
    </ul>
        
    <ul>
        <?php
        asort($series); //Ordena de menor a mayor sin resetear las keys
        foreach ($series as $serie ) {
            ?>
            <li><?php echo $serie ?></li>
            <?php 
            
        }
        ?>
    </ul>

    

    <!-- Bucle while para las series -->
    <ol>
        <?php
        $i = 0;
        while ($i < count($series)) {
        ?>
            <li><?php echo $series[$i] ?></li>
        <?php
            $i++;
        }
        ?>
    </ol>

    <!-- Tabla foreach para las personas -->
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        foreach ($personas as $dni => $nombre) { //este es para los array con  clave valor clave seria el dni el valor el nombre
        ?>
            <tr>
                <td><?php echo $dni ?></td>
                <td><?php echo $nombre ?></td>
            </tr>
        <?php
        }
        ?>
    </table>


    <?php
    $frutas_1 = ["Melocotón" => 0.5, "Sandía" => 1, "Kiwi" => 2];

    $frutas_2 = ["Sandía" => 1, "Melocotón" => 0.5, "Kiwi" => 2];

    if ($frutas_1 == $frutas_2) {
        if ($frutas_1 === $frutas_2) {
            echo "<p>Las frutas son las mismas y están igual ordenadas</p>";
        } else {
            echo "<p>Las frutas son las mismas pero no están igualadas</p>";
        }
    } else {
        echo "<p>Las frutas no son las mismas</p>";
    }
    ?>



    
</body>

</html>