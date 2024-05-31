<?php
require '../database.php';

// Sort y ordenar parametros 'codigo_producto'
$sort_by = $_GET['sort_by'] ?? 'codigo_producto';
$sort_order = $_GET['sort_order'] ?? 'ASC';

// Validar parametros
$valid_columns = ['codigo_producto', 'nif', 'fecha', 'cantidad', 'precio', 'iva', 'caducidad'];
if (!in_array($sort_by, $valid_columns)) {
    $sort_by = 'codigo_producto';
}
if ($sort_order !== 'DESC') {
    $sort_order = 'ASC';
}

// Preparar el query
$stmt = $pdo->prepare("SELECT * FROM compras_producto ORDER BY $sort_by $sort_order");

// Ejecutar
$stmt->execute();

// Resultado
$compras = $stmt->fetchAll();

//La Compra Insertada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $compra = [
        'codigo_producto' => $codigo_producto,
        'nif' => $nif,
        'fecha' => $fecha,
        'cantidad' => $cantidad,
        'precio' => $precio,
        'iva' => $iva,
        'caducidad' => $caducidad
    ];
    $compras[] = $compra;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Compras</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Página de las Compras</h2>
        <a href="create.php" class="btn btn-primary mb-4">Añadir Compra</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="?sort_by=codigo_producto&sort_order=<?= $sort_by === 'codigo_producto' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Código Producto</a></th>
                    <th><a href="?sort_by=nif&sort_order=<?= $sort_by === 'nif' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">NIF</a></th>
                    <th><a href="?sort_by=fecha&sort_order=<?= $sort_by === 'fecha' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Fecha</a></th>
                    <th><a href="?sort_by=cantidad&sort_order=<?= $sort_by === 'cantidad' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Cantidad</a></th>
                    <th><a href="?sort_by=precio&sort_order=<?= $sort_by === 'precio' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Precio</a></th>
                    <th><a href="?sort_by=iva&sort_order=<?= $sort_by === 'iva' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">IVA</a></th>
                    <th><a href="?sort_by=caducidad&sort_order=<?= $sort_by === 'caducidad' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Caducidad</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?= htmlspecialchars($compra['codigo_producto'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['nif'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['fecha'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['cantidad'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['precio'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['iva'] ?? '') ?></td>
                        <td><?= htmlspecialchars($compra['caducidad'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
