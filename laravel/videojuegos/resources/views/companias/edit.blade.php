<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Compania</title>
</head>
<body>
    <div class="container">
        @include('../header')
        <h1>Editar Compania</h1>
        <br>
        <!-- action tiene la ruta del store de el controlador -->
        <form action={{ route('companias.update',  ['compania' => $compania -> id]) }} method="POST">
            {{ method_field('PUT') }}
            @csrf <!-- Protección básica para los  form -->
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $compania->nombre }}">
            <br>
            <label class="form-label">Sede</label>
            <input type="text" class="form-control" name="sede" value="{{ $compania->sede }}">
            <br>
            <label class="form-label">Fecha Fundacion</label>
            <input type="date"  class="form-control" name="fecha" value="{{ $compania->fecha_fundacion }}">
            <br>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('companias.index') }}">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>