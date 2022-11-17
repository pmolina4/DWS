<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Iniciar Sesion</title>
</head>

<body>
    <?php
    require 'databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        if (!empty($usuario) && !empty($contrasena)) {
            //creamos la sentencia SQL
            $sql = " SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $conexion->query($sql);
            if ($resultado -> num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $hash_contrasena = $row["contrasena"];
                }
                $acceso_valido = password_verify($contrasena, $hash_contrasena);

                if ($acceso_valido == TRUE) {
                    echo " registro valido";
                    //CREO UN INICIO DE SESION Y MANDO EL USUARIO CON EL ID USUARIO
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    header("location: index.php");

                } else {
                    echo "error de pass";   
                }
            }
        }
    }
    ?>

    <div class="container">
        <h1>Inciar Sesión</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class=" form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" name="usuario" type="text">
                    </div>
                    <div class=" form-group mb-3">
                        <label class="form-label">Contrasena</label>
                        <input class="form-control" name="contrasena" type="password">
                    </div>
                    <div class=" form-group mb-3">
                        <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>