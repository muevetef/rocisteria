<?php
require '../database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Si llegan datos por post se tratan
//Se insertan en la bdd
//sinó llegan datos se muestra el formulario
//si todo va bién hacemos una redirección a index

$sql = 'SELECT * FROM categorias';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll();

$sql2 = 'SELECT unidad FROM productos GROUP BY unidad';
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$unidad = $stmt2->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $code = trim(htmlspecialchars($_POST['code-p']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $unidad = trim(htmlspecialchars($_POST['unidad']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    $alertaStock = trim(htmlspecialchars($_POST['alerta']));
    $stock = trim(htmlspecialchars($_POST['stock']));
    $precio = trim(htmlspecialchars($_POST['precio']));


    $sql3 = 'INSERT INTO productos (codigo_producto, nombre, unidad, alerta_stock, id_categoria, stock, precio_compra) VALUES (:code, :nombre, :unidad, :alerta, :categoria, :stock, :precio)';

    $stmt3 = $pdo->prepare($sql3);

    $params = [
        'code' => $code,
        'nombre' => $nombre,
        'unidad' => $unidad,
        'alerta' => $alertaStock,
        'categoria' => $categoria,
        'stock' => $stock,
        'precio' => $precio
    ];

    $stmt3->execute($params);
    // echo "<pre>";
    // var_dump($params);
    // echo "</pre>";
    // die();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm w-50">
        <h1>Nuevo Producto</h1>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="code-p" class="form-label">Código del Producto:</label>
                <input type="number" class="form-control" name="code-p" id="code-p">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="unidad" class="form-label">Tipo de Unidad</label>
                <select name="unidad" class="form-select form-select-lg mb-3" id="unidad">
                    <option disabled selected>Selecciona un tipo de Unidad</option>
                    <?php foreach ($unidad as $u) : ?>
                        <option value="<?= $u['unidad'] ?>"><?= $u['unidad'] ?></option>
                    <?php endforeach ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="alerta" class="form-label">Alerta Stock</label>
                <input type="text" class="form-control" name="alerta" id="alerta">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select form-select-lg mb-3" id="categoria">
                    <option selected disabled>Selecciona una categoria</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['categoria'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="text" class="form-control" name="stock" id="stock">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio de compra:</label>
                <input type="text" class="form-control" name="precio" id="precio">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary btn-nueva my-2" type="submit" name="submit">Añadir</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>