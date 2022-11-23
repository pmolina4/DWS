<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $pegi = $_POST["pegi"];
            $descripcion = $_POST["descripcion"];

            if (!empty($nombre) && !empty($precio) && !empty($pegi) && !empty($descripcion)) {
                $nuevoJuego = [$nombre, $precio, $pegi, $descripcion];
            }
        }
    ?>
    <div class="container">
        <h1>Registrar VideoJuego</h1>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
            <br>
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio">
            <br>
            <label class="form-label">PEGI</label>
            <select name="pegi" id="pegi" class="form-select">
                <option value="" selected default hidden>Seleccione una categoria</option>
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <br>
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="descripcion">
            <br>
            <button class="btn btn-primary" type="submit">Crear</button>
            <a class="btn btn-secondary" href="/juegos">Volver</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>