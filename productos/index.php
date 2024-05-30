<?php
require '../database.php';

//preparar la consulta
$stmt = $pdo->prepare('SELECT p.codigo_producto as codigo , p.nombre as nombre, p.unidad as unidad, p.alerta_stock as alerta_stock, c.categoria as categoria, p.stock as stock, p.precio_compra as precio_compra   FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id_categoria ORDER BY codigo ASC');

//ejecutamos la consulta
$stmt->execute();
//Obtenemos 
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre> ';
// var_dump($productos);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Administración de Productos</h1>
    <a class="btn btn-primary btn-nueva my-2" href="Create.php">Añadir Producto</a>
    <table class="table table-bordered grocery-crud-table table-hover">
        <thead>
            <tr>
                <th scope="col">Código de Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Unidad</th>
                <th scope="col">Alerta Stock</th>
                <th scope="col">ID Categoria</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <th scope="row"><?= $producto['codigo'] ?></th>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['unidad'] ?></td>
                    <td><?= $producto['alerta_stock'] ?></td>
                    <td><?= $producto['categoria'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['precio_compra'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>