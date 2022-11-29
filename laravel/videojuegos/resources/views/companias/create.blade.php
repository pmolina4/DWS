<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Compania</title>
</head>
<body>
    <div class="container">
        @include('../header')
        <h1>Registrar Compania</h1>
        <br>
        <!-- action tiene la ruta del store de el controlador -->
        <form action="{{ route('companias.index') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Protección básica para los  form -->
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
            <br>
            <label class="form-label">Sede</label>
            <input type="text" class="form-control" name="sede">
            <br>
            <label class="form-label">Fecha Fundacion</label>
            <input type="date"  class="form-control" name="fecha">
            <br>
            <button class="btn btn-primary" type="submit">Crear</button>
            <a class="btn btn-secondary" href="{{ route('companias.index') }}">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>