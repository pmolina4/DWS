<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Consolas</title>

</head>

<body>
    <div class="container">
        @include('../header')
        <h1>Index de consolas</h1>

        <!-- recuperamos el valor de la variable $mensaje que viene de la funcion index de consolascontroller -->
        <p>{{ $mensaje }}</p>

        <ul>
            @foreach ($consolas as $consola)
                <li>{{ $consola }}</li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
