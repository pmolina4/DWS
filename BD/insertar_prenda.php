<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Nueva Prenda</title>
</head>

<body>

    <?php
        //importamos fichero para la conexion de la bd
        require 'util/databases.php';
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $talla = $_POST["talla"];
            $precio = $_POST["precio"];
            //comprobamos que los datos se han introducido en el formulario
            if(!empty($nombre) && !empty($talla) && !empty($talla)){  
                //creamos la sentencia SQL
                $sql = "INSERT INTO ropa (nombre, talla, precio)
                    VALUES('$nombre', '$talla','$precio')";
                //si la sentencia se ejecuta correctamente mostramos ok si no pues no
                if($conexion -> query($sql) == "TRUE"){
                    echo"<p>Prenda Insertada</p>";
                }else{
                    echo"<p>Error al insertar</p>";
                }
            }
        }
    ?>

    <div class="container">
        <h1>Nueva Prenda</h1>

        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <label class="form-label" >Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                    <br>
                    <label class="form-label">Talla</label>
                    <input type="text" class="form-control" name="talla">
                    <br>
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio">
                    <br>
                    <button class="btn btn-primary" type="submit">Crear</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>