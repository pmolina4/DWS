<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Show</title>
</head>

<body>
    <div class="container">
        @include('header')
        <h1>Mostrar Videojuegos</h1>
        <p>Titulo: {{ $videojuego -> titulo }}</p>
        <p>Precio: {{ $videojuego -> precio }}</p>
        <p>PEGI: {{ $videojuego -> pegi }}</p>
        <p>Descripcion: {{ $videojuego -> descripcion }}</p>
        <form method="GET" action={{ route('juegos.edit', ['juego' => $videojuego -> id]) }} >
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
