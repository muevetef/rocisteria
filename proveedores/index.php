<?php
require '../database.php';

//Preparar la consulta
$stmt = $pdo->prepare('SELECT * FROM proveedores');

//ejecutamos la consulta
$stmt->execute();

//Obenemos los resultados
$proveedores = $stmt->fetchAll();

// echo "<pre>";
// var_dump($proveedores);
// echo "</pre>";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h1 class="text-center m-5">Administración de Proveedores</h1>


<div class="container">
<div class="shadow p-3 mb-5 rounded">
    <table class="table">
        <thead>
            <tr>
                <th scope="row">NIF</th>
                <th scope="row">Empresa</th>
                <th scope="row">Contacto</th>
                <th scope="row">Email</th>
                <th scope="row">Web</th>
                <th scope="row">Registro</th>
            </tr>
        </thead>
        <?php foreach ($proveedores as $proveedor) : ?>
            <tr>

                <td><?= $proveedor['nif'] ?></td>
                <td><?= $proveedor['empresa'] ?></td>
                <td><?= $proveedor['contacto'] ?></td>
                <td><?= $proveedor['email'] ?></td>
                <td><?= $proveedor['web'] ?></td>
                <td><?= $proveedor['registro'] ?></td>
                <td><button type="submit" class="btn btn-outline-primary"><a href="proveedor.php?nif=<?= $proveedor['nif'] ?>" class="link-underline-light">+ info</a></button</td>
            </tr>
            <?php endforeach ?>
    </table>
</div>
    </div>
</body>

</html>