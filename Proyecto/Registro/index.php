<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Website CSS style -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Registro Usuario</title>
</head>

<body>
    <?php
    require '../resources/util/databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["name"];
        $usuario = $_POST["username"];
        $contrasena = $_POST["password"];
        $contrasenaConfirm = $_POST["confirm"];

        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        if (!empty($nombre) && !empty($usuario) && !empty($contrasena) && !empty($contrasenaConfirm)) {
            //creamos la sentencia SQL
            if ($contrasena == $contrasenaConfirm) {
                $sql = "INSERT INTO usuarios (contrasena, usuario, nombre)
                VALUES('$hash_contrasena', '$usuario','$nombre')";

                //si la sentencia se ejecuta correctamente mostramos ok si no pues no
                if ($conexion->query($sql) == "TRUE") {
    ?>
                    <meta http-equiv="refresh" content="3; url='http://localhost/DWS/Proyecto/'" />
    <?php
                } else {
                    echo "<p>Error al insertar</p>";
                }
            } else {
                echo "<p>No coinciden las constrasenas</p>";
            }
        }
    }
    ?>


    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h5>Registro De Inicio De Sesion</h5>
                <form class="" method="post" action="#">

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Introduce tu nombre" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Introduce Nombre Usuario" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Contrasena</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce constrasena" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Confirmar Contrasena</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirmar Contrasena" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <button href="" type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>