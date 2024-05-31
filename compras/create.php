<?php
require '../database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $codigo_producto = $_POST['codigo_producto'];
    $nif = $_POST['nif'];
    $fecha = date('Y-m-d', strtotime($_POST['fecha']));  
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $iva = $_POST['iva'];
    $caducidad = date('Y-m-d', strtotime($_POST['caducidad']));

    $sql = 'INSERT INTO compras_producto (codigo_producto, nif, fecha, cantidad, precio, iva, caducidad) VALUES (:codigo_producto, :nif, :fecha, :cantidad, :precio, :iva, :caducidad)';
    $stmt = $pdo->prepare($sql);

    $params = [
        'codigo_producto' => $codigo_producto,
        'nif' => $nif,
        'fecha' => $fecha,
        'cantidad' => $cantidad,
        'precio' => $precio,
        'iva' => $iva,
        'caducidad' => $caducidad
    ];

    $stmt->execute($params);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Añadir Compra</h1>
    <form method="post" action="create.php">
        <div class="mb-3">
            <label for="codigo_producto" class="form-label">Código Producto</label>
            <input type="number" class="form-control" id="codigo_producto" name="codigo_producto" required>
            </div>
            <div class="mb-3">
                <label for="nif" class="form-label">NIF</label>
                <input type="text" class="form-control" id="nif" name="nif" required>
            </div>
            <div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
</div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="iva" class="form-label">IVA</label>
                <input type="text" class="form-control" id="iva" name="iva" required>
            </div>
            <div class="mb-3">
                <label for="caducidad" class="form-label">Caducidad</label>
                <input type="date" class="form-control" id="caducidad" name="caducidad" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
            <a href="index.php">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
