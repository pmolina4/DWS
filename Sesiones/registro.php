<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Registro</title>
</head>

<body>
    <?php
    require 'databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $rol = $_POST['rol'];

        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        if (!empty($nombre) && !empty($usuario) && !empty($contrasena)) {
            //creamos la sentencia SQL
            $sql = "INSERT INTO usuarios (contrasena, usuario, nombre, rol)
                    VALUES('$hash_contrasena', '$usuario','$nombre', '$rol')";

            //si la sentencia se ejecuta correctamente mostramos ok si no pues no
            if ($conexion->query($sql) == "TRUE") {
                echo "<p>Usuario Insertada</p>";
                header("location: iniciar_sesion.php");
            } else {
                echo "<p>Error al insertar</p>";
            }
        }
    }
    ?>

    <div class="container">
        <h1>Registrate</h1>
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
                        <label class="form-label">Nombre</label>
                        <input class="form-control" name="nombre" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <select name="rol" id="rol" class="form-select">
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>
                        </select>
                    </div>
                    <div class=" form-group mb-3">
                        <button class="btn btn-primary" type="submit">Registarte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>