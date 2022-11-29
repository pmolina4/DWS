<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Juego</title>
</head>

<body>
    <div class="container">
        @include('header')
        <h1>Editar Juego</h1>
        <br>
        <form method="POST" action={{ route('juegos.update', ['juego' => $videojuego -> id]) }} >
            {{ method_field('PUT') }}
            @csrf
            <!-- Protección básica para los  form -->
            <label class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{ $videojuego->titulo }}">
            <br>
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" value="{{ $videojuego->precio }}">
            <br>
            <label class="form-label">PEGI</label>
            <select name="pegi" id="pegi" class="form-select" value="{{ $videojuego->pegi }}">
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <br>
            <label class="form-label">Descripcion</label>
            <textarea class="form-control" name="descripcion" >{{ $videojuego->descripcion }}</textarea>
            <br>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('juegos.index') }}">Volver</a>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
