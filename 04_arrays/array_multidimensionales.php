<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ARRAY MULTIDIMENSIONALES</title>
</head>

<body>
    <!-- HARRAY MULTIDIMENSIONALES-->
    <div class="container">
        <table>
            <tr>
                <th>Juego</th>
                <th>Plataforma</th>
                <th>precio</th>
            </tr>

            <?php
            $juegos = [
                ["Pacman", "Atari", 60],
                ["Fornite", "PS4", 0],
                ["Mario Kart", "Super Nintendo", 70],
                ["Street Fighter", "PS4", 50],
                ["Legend of Zelda", "Nintendo 64", 40],
                ["Castelvania", "Nintendo 64", 55]
            ];

            //añadir un nuevo elemento en array multidimensional
            $nuevo_juego = ["Fruit Ninja", "Movil", 0];
            array_push($juegos, $nuevo_juego);
            unset($juegos[1]);

            //Ordenar arraymulti
            $titulo = array_column($juegos, 0); //guardamos el campo por el cual vamos a ordenar luego
            array_multisort($titulo, SORT_ASC, $juegos); //con esta funcion se ordena un array multidimensional(ordenamos por titulo)

            //Recorrer array multidimensional
            foreach ($juegos as $juego) {
                list($nombre, $consola, $precio) = $juego;
            ?>
                <tr>
                    <td><?php echo "Nombre: $nombre" . "<br>"; ?></td>
                    <td><?php echo "Consola: $consola" . "<br>"; ?></td>
                    <td><?php echo "Precio: $precio" . "<br><br>"; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>