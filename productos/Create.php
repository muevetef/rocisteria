<?php
require '../database.php';
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
    $nombre = trim(htmlspecialchars($_POST['nombre']));


    $sql3 = 'INSERT INTO posts (title, body) VALUES (:title, :body)';
    $stmt = $pdo->prepare($sql);

    $params = [
        'title' => $title,
        'body' => $body
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
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Nuevo Producto</h1>
        </div>
    </header>
    <div class="container-sm w-50">
        <form action="#" method="post">
            <div class="mb-3">
                <label for="code-p" class="form-label">Código del Producto:</label>
                <input type="text" class="form-control" name="code-p" id="code-p">
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
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>