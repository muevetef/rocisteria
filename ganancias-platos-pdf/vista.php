<?php
require '../database.php';

$sql = 'SELECT * FROM rocisteria.ultimasfechas;';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fechas = $stmt->fetchAll();

$sql = 'SELECT * FROM rocisteria.ganancias;';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ganancias = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen vistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
    <h2 class="text-center">Vistas y Resumenes</h2>
    <table class="table caption-top">
    <caption>Platos y últimas fechas de pedidos</caption>
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Último pedido</th>
                <th scope="col">Tipo</th>
               
            </tr>
        </thead>
        <tbody>

            <?php foreach ($fechas as $plato) : ?>
                <tr>
                    <th scope='row'><?= $plato['nombre'] ?></th>
                    <td><?= $plato['ultima fecha'] ?></td>
                    <td><?= $plato['tipos_de_plato'] ?> </td>
                </tr>

            <?php endforeach ?>
        </tbody>
</div>
<div class="container">
        

        <table class="table caption-top">
            <caption>Resumen de Ganancias por Plato</caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Coste</th>
                    <th scope="col">PvP</th>
                    <th scope="col">Ganancias</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($ganancias as $plato) : ?>
                    <tr>
                        <th scope='row'><?= $plato['nombre'] ?></th>
                        <td><?= number_format($plato['coste'], 2) ?>€</td>
                        <td> <?= number_format($plato['precio'], 2) ?> €</td>
                        <td><?= number_format($plato['ganancia'], 2) ?> €</td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <a href="../productos/index.php">Ir a Productos</a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>