<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
</head>

<body>
    <!-- añadimos la barra de navegacion -->
    <?php
    require '../resources/header.php';
    ?>
    <div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../resources/img/cursos-pablo-monteserin.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/img/seo.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container ">
        <div class="row mt-5 mx-auto justify-content-center">
            <div class="col-8">
                <p class="list-group">
                <H1>Ejercicios Desarrollo Web Servidor</H1>
                </p>
            </div>
        </div>
        <?php
        //cogemos el rol del sesion que esta en el header que lometemeos con un require
        $rol = $_SESSION["rol"];
        //mostramos todas las ca
        if ($rol == "administrador") {


        ?>
            <div class="row mt-5 pb-5">
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="../resources/img/html5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Ropa</h5>
                            <p class="card-text">
                                En este apartado podrás ver toda la ropa disponible.
                                También puedes añadir nuevas prendas , borrarlas y editarlas.
                            </p>
                            <a href="http://localhost/DWS/Proyecto/ropa/index.php" class="btn btn-outline-info">Visítanos</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="../resources/img/html5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Cliente</h5>
                            <p class="card-text">
                                En este apartado podrás ver todos los clientes.
                                Tambien puedes elegir el avatar, puedes añadir nuevos
                                clientes al igual que borrarlos y editarlos.
                            </p>
                            <a href="http://localhost/DWS/Proyecto/cliente/index.php" class="btn btn-outline-info">Visítanos</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="../resources/img/html5.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tienda</h5>
                        <p class="card-text">
                            En este apartado podrás ver las Compras realizadas por los clientes
                            Podrás ver el precio total de la compra.
                        </p>
                        <a href="http://localhost/DWS/Proyecto/compras/index.php" class="btn btn-outline-info">Visítanos</a>
                    </div>
                </div>
            </div>
            </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>