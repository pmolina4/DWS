<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php 
                //recuperamos la sesion
                session_start();
                //comprobamos si hay sesion
                if (!isset($_SESSION["usuario"])) { // si no hay sesion nos redirige todo el rato al login
                    header("location: iniciar_sesion.php");
                }else{
                    echo"<p>". $_SESSION["usuario"] ."</p>";// si hay sesion pues mostramos el echo en la pagina destino 
                }
            ?>
        </div>
    </div>

    <a href="desconectarse.php">Cerrar sesion</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>