<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Videojuegos</title>
</head>
<body>
    <h2>Nuevo videojuego</h2>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temp_titulo = depurar($_POST["titulo"]);
            $temp_precio = depurar($_POST["precio"]);
            if (isset($_POST["consola"])) {
                $temp_consola = depurar($_POST["consola"]);
            } else {
                $temp_consola = "";
            }
            $temp_descripcion = $_POST["descripcion"];

            //  Validación de la descripción
            if (empty($temp_descripcion)) {
                $err_descripcion = "La descripción es obligatoria";
            } else {
                if (strlen($temp_descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                } else {
                    $descripcion = $temp_descripcion;
                }
            }

            if (empty($temp_consola)) {
                $err_consola = "La consola es obligatoria";
            } else {
                $consola = $temp_consola;
            }

            if (empty($temp_titulo)) {
                $err_titulo = "El título es obligatorio";
            } else {
                if (strlen($temp_titulo) > 40) {
                    $err_titulo = "El título no puede tener más de 40 caracteres";
                } else {
                    //  ¡ÉXITO!
                    $titulo = $temp_titulo;
                }
            }

            if (empty($temp_precio)) {
                $err_precio = "El precio es obligatorio";
            } else {
                $temp_precio = filter_var($temp_precio, FILTER_VALIDATE_FLOAT);

                if (!$temp_precio) {
                    $err_precio = "El precio debe ser un número";
                } else {
                    $temp_precio = round($temp_precio, 2);
                    if ($temp_precio < 0) {
                        $err_precio = "El precio no puede ser negativo";
                    } else if ($temp_precio >= 10000) {
                        $err_precio = "El precio no puede ser igual o superior a 10000";
                    } else {
                        //  ¡ÉXITO!
                        $precio = $temp_precio;
                    }
                }
            }

            if (isset($titulo) && isset($precio) && isset($consola) && isset($descripcion)) {
                echo "<p>$titulo</p>";
                echo "<p>$precio</p>";
                echo "<p>$consola</p>";
                echo "<p>$descripcion</p>";
            }
        }
        
        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>
    <form action="" method="post">
        <p>Título: <input type="text" name="titulo">
            <span class="error">
                * <?php if(isset($err_titulo)) echo $err_titulo ?>
            </span>
        </p>
        <p>Precio: <input type="text" name="precio">
            <span class="error">
                * <?php if(isset($err_precio)) echo $err_precio ?>
            </span>
        </p>
        <p>Consola: 
            <select name="consola">
                <option value="" selected disabled hidden>Elige una consola</option>
                <option value="ps4">Playstation 4</option>
                <option value="ps5">Playstation 5</option>
                <option value="switch">Nintendo Switch</option>
            </select>
            <span class="error">
                * <?php if(isset($err_consola)) echo $err_consola ?>
            </span>
        </p>
        <p>Descripción: <textarea name="descripcion"></textarea>
            <span class="error">
                * <?php if(isset($err_descripcion)) echo $err_descripcion ?>
            </span>
        </p>
        <p><input type="submit" value="Crear"></p>
    </form>
</body>
</html>