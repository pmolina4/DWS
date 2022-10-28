<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    </meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    </meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Videojuegos</h1>
                <form action="ejercicio_videojuegos.php" method="post">
                    <div>
                        <label class="form-label">Nombre:</label><br>
                        <input type="text" name="nombre" class="form-control"><br>

                        <label class="form-label">Consola</label><br>
                        <select name="consola" class="form-select">
                            <option value="ps4">PS4</option>
                            <option value="ps5">PS5</option>
                            <option value="switch">Switch</option>
                        </select><br>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">¿Edición Especial?</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nombre = $_POST["nombre"];
                    $consola = $_POST["consola"];
                    $especial = "";
                    if (isset($_POST["especial"])) {
                        $especial = $_POST["especial"];
                    }

                    $precio = 0;

                    //  Comprobamos la consola
                    if ($consola == "ps4") {
                        $precio = 60;
                    } else if ($consola == "ps5") {
                        $precio = 70;
                    } else if ($consola == "switch") {
                        $precio = 40;
                    }

                    //  Comprobamos si es edición especial
                    if ($especial == "si") {
                        $precio *= 1.25;
                    }

                    echo "<h3>El videojuego $nombre vale $precio</h3>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>