<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Compania</title>
</head>

<body>
    <div class="container">
        <!-- Añadimos el menu de navegacion -->
        @include('../header')
        <div class="row mt-5 mx-auto justify-content-center">
            <h1>Index Compania</h1>
            <div class="row">
                <div class="col-12">
                    <table class="table  table-striped table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Sede</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                        </tr>
                        {{-- Comentaro Blade  --}}
                        @foreach ($companias as $compania)
                            <tr>
                                <td>{{ $compania->nombre }}</td>
                                <td>{{ $compania->sede }}</td>
                                <td>{{ $compania->fecha_fundacion }}</td>
                                <td>
                                    <form action={{ route('companias.show', ['compania' => $compania->id]) }}
                                        method="GET">
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td>
                                <td>
                                    <form action={{ route('companias.destroy', ['compania' => $compania -> id]) }} method="POST">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
