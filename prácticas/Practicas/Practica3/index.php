<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Arrays - Relaccion 2</title>
</head>

<body>
    <h1>Arrays -Relacción 2</h1>
    <h2>Ejercicio 1</h2>
    <?php

    $productos = [
        ["Mesa", 80],
        ["Silla", 50],
        ["Monitor", 55],
        ["Teclado", 15],
    ];

    ?>

    <table class="table table-dark table-striped-columns">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>

        <?php
        $preciototal = 0;
        $nombre_producto = array_column($productos, 0);
        array_multisort($nombre_producto, SORT_ASC, $productos);
        foreach ($productos as $producto) {
            list($nombre_producto, $precio) = $producto;
            $preciototal = $preciototal + $precio;
        ?>
            <tr>
                <td><?php echo $nombre_producto ?></td>
                <td><?php echo $precio ?></td>
            </tr>

        <?php
        }
        ?>
        <tr>
            <th>Numero de productos : <?php echo sizeof($productos) ?> </th>
            <th>Pecio total : <?php echo $preciototal ?> </th>
        </tr>
    </table>

    <h2>Ejercicio 2</h2>
    <?php
    $productos2 = [
        ["Mesa", 80, 2],
        ["Silla", 50, 2],
        ["Monitor", 55, 2],
        ["Teclado", 15, 1]
    ];
    ?>
    <table class="table table-dark table-striped-columns">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $preciototal = 0;
        $totalCantidad = 0;
        $nombre_producto = array_column($productos, 0);
        array_multisort($nombre_producto, SORT_ASC, $productos);
        foreach ($productos2 as $producto) {
            list($nombre_producto, $precio, $cantidad) = $producto;
            $precioCantidad = $cantidad * $precio;
            $preciototal += $precioCantidad;
            $totalCantidad += $cantidad;
        ?>
            <tr>
                <td><?php echo $nombre_producto ?></td>
                <td><?php echo $precio ?></td>
                <td><?php echo $cantidad ?></td>
                <td><?php echo $precioCantidad ?></td>
            </tr>

        <?php
        }
        ?>
        <tr>
            <th>Numero de productos : <?php echo sizeof($productos) ?> </th>
            <th></th>
            <th>Total:<?php echo $totalCantidad ?> </th>
            <th>Pecio total : <?php echo $preciototal ?> </th>
        </tr>
    </table>

    <div class="container">
        <h2>Ejercicio 3</h2>
        <table class="table table-success table-striped">
            <tr>
                <th>Numeros Indivisibles de 3</th>
            </tr>
            <?php
            $numeros = [];
            for ($i = 1; $i <= 50; $i++) {
                $numeros[$i] = $i;
            }
            foreach ($numeros as $key => $valor) {
                if ($key % 3 == 0) {
                    unset($numeros[$valor]);
                }
            }
            foreach ($numeros as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value . "<br>"; ?></td>
                </tr>
            <?php
            }

            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>