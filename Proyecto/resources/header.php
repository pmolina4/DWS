<?php
//recuperamos la sesion
session_start();
//redcohemos el rol del usuario
$rol = $_SESSION["rol"];

if ($rol == "administrador") {
?>
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">Cenec Moda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="http://localhost/DWS/Proyecto/Inicio/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://localhost/DWS/Proyecto/ropa/index.php">Ropa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://localhost/DWS/Proyecto/cliente/index.php">Cliente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://localhost/DWS/Proyecto/compras/index.php">Compras</a>
                            </li>
                        </ul>
                    </div>
                    <a href="http://localhost/DWS/Proyecto/resources/cerrarSesion/cerrarSesion.php"><img src="../resources//img/check-out.png" style="width: 30px;"></a>
                    <?php

                    //comprobamos si hay sesion
                    if (!isset($_SESSION["usuario"])) { // si no hay sesion nos redirige todo el rato al login
                        header("location: http://localhost/DWS/Proyecto/");
                    } else {
                        echo "<a>" . $_SESSION["usuario"] . "</a>"; // si hay sesion pues mostramos el echo en la pagina destino 
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
<?php
} else {
?>

    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">Cenec Moda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="http://localhost/DWS/Proyecto/Inicio/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://localhost/DWS/Proyecto/compras/index.php">Compras</a>
                            </li>
                        </ul>
                    </div>
                    <a href="http://localhost/DWS/Proyecto/resources/cerrarSesion/cerrarSesion.php"><img src="../resources//img/check-out.png" style="width: 30px;"></a>
                    <?php

                    //comprobamos si hay sesion
                    if (!isset($_SESSION["usuario"])) { // si no hay sesion nos redirige todo el rato al login
                        header("location: http://localhost/DWS/Proyecto/");
                    } else {
                        echo "<a>" . $_SESSION["usuario"] . "</a>"; // si hay sesion pues mostramos el echo en la pagina destino 
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
<?php
}
?>