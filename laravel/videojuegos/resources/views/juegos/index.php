<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Index</title>
</head>

<body>
    <div class="container">
        <!-- Añadimos el menu de navegacion -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cenec</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Videojuegos</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Registrar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Visualiazr</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row mt-5 mx-auto justify-content-center">
            <h1>Index Videojuegos</h1>
            <div class="row">
                <div class="col-9">
                    <table class="table  table-striped table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>PEGI</th>
                            <th>Descripcion</th>
                        </tr>
                        <?php
                        foreach ($videojuegos as $juego) {
                            list($nombre, $precio, $pegi, $descripcion) = $juego;
                            # code...
                        ?>
                            <tr>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $precio ?></td>
                                <td><?php echo $pegi ?></td>
                                <td><?php echo $descripcion ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script></body>

</html>