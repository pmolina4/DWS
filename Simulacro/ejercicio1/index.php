<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ejercicio 1</title>
</head>

<body>
<!--  FALTA ORDENAR POR TITULO-->

    <?php
    //CREAMOS EL ARRAY DE PERSONAJES
    $personajes = [
        ["Pablo", 25, "Maculino", "FIFA"],
        ["Lorenzo", 24, "Maculino", "COD"],
        ["Berta", 21, "Femenino", "ZELDA"],
    ];

    //AÑADIR UN PERSONAJE EN EL ARRAY
    $nuevo_personaje = ["Juan", 33, "Masculino", "ANimal Crosing"];
    array_push($personajes, $nuevo_personaje);

    //MODIFICAMOS UN PERSONAJE DE EL ARRAY
    $personajes[1][0] = "Alvaro";

    //ELIMINAMOS UN PERSONAJE DE EL ARRAY
    unset($personajes[0]);


    ?>
    <table>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Género</th>
        <th>Titulo Juego</th>
        <?php
        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
            //ORDENAR EL ARRAY POR EL TITULO
            //array_multisort($personaje , SORT_ASC, $personajes)

        ?>
            <tr>
                <td><?php echo $nombre ?></td>
                <td><?php echo $edad ?></td>
                <td><?php echo $genero ?></td>
                <td><?php echo $titulo ?></td>
            </tr>

        <?php
        }
        ?>
    </table>

</body>

</html>