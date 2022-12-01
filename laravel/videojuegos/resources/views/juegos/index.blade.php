<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Index</title>
</head>

<body>
    <div class="container">
        <!-- Añadimos el menu de navegacion -->
        @include('../header')

        <div class="row mt-5 mx-auto justify-content-center">
            <h1>Index Videojuegos</h1>
            <!-- Para mostrar variables sin tener que abrir las etiquetas de php -->
            <p>{{ $mensaje }}</p>
            <form method="GET" action={{ route('juegos.search') }}>
                @csrf
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Buscar por Titulo</label>
                    <div class="col-sm-7">
                        <input type="text" name="buscador" class="form-control" id="colFormLabel" placeholder="Búsqueda">
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <table class="table  table-striped table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>PEGI</th>
                            <th>Descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                        {{-- Comentaro Blade  --}}
                        @foreach ($videojuegos as $juego)
                            <tr>
                                <td>{{ $juego->titulo }}</td>
                                <td>{{ $juego->precio }}</td>
                                <td>{{ $juego->pegi }}</td>
                                <td>{{ $juego->descripcion }}</td>
                                <td>
                                    <form action={{ route('juegos.show', ['juego' => $juego->id]) }} method="GET">
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td>
                                <td>
                                    <form action={{ route('juegos.destroy', ['juego' => $juego->id]) }}
                                        method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
