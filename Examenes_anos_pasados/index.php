<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Simulacro</title>
</head>

<body>
    <div class="container">
        <?php

        //PARTE 1
        $seriesTV = [
            ["Doraemon", 100, "2005-12-12"],
            ["Pokemon", 50, "2001-10-11"],
            ["CodigoLioko", 100, "2000-08-22"]
        ];

        //PARTE 2
        $nuevaSerie = ["Naruto", 300, "1997-05-01"];
        array_push($seriesTV, $nuevaSerie);
        unset($seriesTV[0]);
        ?>
        <!-- PARTE 3 -->
        <table class="table table-dark table-striped-columns">
            <th>Titulo</th>
            <th>NºCapitulos</th>
            <th>Fecha Estreno</th>
            <?php
            foreach ($seriesTV as $serie) {
                list($titulo, $capitulos, $fecha) = $serie;
            ?>
                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $capitulos ?></td>
                    <td><?php echo $fecha ?></td>
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