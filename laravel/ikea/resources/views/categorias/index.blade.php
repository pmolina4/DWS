<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Index Categoria!</h1>

        <ul>
            @foreach ($categorias as $categoria)
                <li>{{ $categoria->nombre }}</li>
                <ul>
                    @php
                        //de la categoria llamamos a la funcion productos que hemos creado en el modelo 
                        //que esta funcion busca en los productos todos los relaccionados con esta categoria
                        $productos = $categoria -> productos
                    @endphp
                    <!-- Recorremos los productos que hemos guardado y accedemos ha su nombre -->
                    @foreach ($productos as $producto)
                        <li>{{ $producto -> nombre }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
