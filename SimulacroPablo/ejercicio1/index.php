<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    //CREAMOS EL ARRAY DE PERSONAJES
    $personajes = [
        ["Pablo", 25, "Maculino", "FIFA"],
        ["Lorenzo", 24, "Maculino", "COD"],
        ["Berta", 21, "Femenino", "ZELDA"],
    ];
    ?>
    <h1>Tabla Personaje Completa</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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

    <h1>Tabla Personaje Añadido</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        //AÑADIR UN PERSONAJE EN EL ARRAY
        $nuevo_personaje = ["Juan", 33, "Masculino", "ANimal Crosing"];
        array_push($personajes, $nuevo_personaje);

        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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



    <h1>Tabla Personaje Borrado</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        //ELIMINAMOS UN PERSONAJE DE EL ARRAY
        unset($personajes[0]);

        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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

    <h1>Tabla Personaje Modificado</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        //PERSONAJE MODIFICADOS
        $personajes[2] = ["Berta", 50, "Femenino", "ZELDA"];

        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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

    <h1>Tabla Personaje Ordenado por inserccion</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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

    <h1>Tabla Personaje Ordenado por inserccion</h1>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Videojuego</th>
        </tr>
        <?php
        //ORDENADOR EL ARRAY POR nOMBRE DE VIDEOJUEGO Y POR NOMBRE DE PERSONAJE
        $ordenVideojuego = array_column($personajes, 3);
        $ordenNombre = array_column($personajes, 0);

        array_multisort($ordenVideojuego, SORT_ASC, $ordenNombre, SORT_ASC, $personajes);

        foreach ($personajes as $personaje) {
            list($nombre, $edad, $genero, $titulo) = $personaje;
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