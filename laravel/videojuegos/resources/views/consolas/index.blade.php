<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>

</head>

<body>
    <h1>Index de consolas</h1>

    <!-- recuperamos el valor de la variable $mensaje que viene de la funcion index de consolascontroller -->
    <p>{{$mensaje}}</p>

    <ul>
        @foreach($consolas as $consola)

        <li>{{$consola}}</li>

        @endforeach
    </ul>
</body>

</html>