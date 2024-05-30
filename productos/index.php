<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Lista de Productos</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">Código Producto</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">IVA</th>
                    <th scope="col">Fecha de Caducidad</th>
                    <th scope="col">Edición</th>
                    <th scope="col">Borrado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>12345678A</td>
                    <td>2024-05-30</td>
                    <td>10</td>
                    <td>15.50</td>
                    <td>21%</td>
                    <td>2025-05-30</td>
                    <td><button class="btn btn-primary btn-sm">Editar</button></td>
                    <td><button class="btn btn-danger btn-sm">Borrar</button></td>
                </tr>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>