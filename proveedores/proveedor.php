<?php
//si no existe el parametro id le asignamos null
$nif = $_GET['nif'] ?? null;
//si no tiene valor vamos al index
if (!$nif) {
    header('Location: index.php');
    exit;
}

require 'database.php';
$sql = 'SELECT * FROM proveedores WHERE nif = :nif';
$stmt = $pdo->prepare($sql);
$params = ['nif' => $nif];
$stmt->execute($params);
$proveedor = $stmt->fetch();

$sql = 'SELECT * FROM telefonos WHERE nif = :nif';
$stmt = $pdo->prepare($sql);
$params = ['nif' => $nif];
$stmt->execute($params);
$telefonos = $stmt->fetchAll();

$sql = 'SELECT * FROM direcciones WHERE nif = :nif';
$stmt = $pdo->prepare($sql);
$params = ['nif' => $nif];
$stmt->execute($params);
$direccion = $stmt->fetch();

// if (!$direccion) {
//     $direccion['calle'] = "no tiene";
//     $direccion['numero'] = "no tiene";
//     $direccion['poblacion'] = "no tiene";
//     $direccion['cp'] = "no tiene";
// }


echo "<pre>";
var_dump($proveedor);

var_dump($telefonos);
var_dump($direccion);

echo "</pre>";

if (!$proveedor) {
    header('Location: index.php');
    exit;
}

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
    <h1 class="text-center">Datos de Proveedor</h1>


    <div class="container">
        <div class="shadow p-3 mb-5 rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="row"> <?= $proveedor['empresa'] ?></th>
                    </tr>
                </thead>

                <tr>
                    <td>NIF</td>
                    <td><?= $proveedor['nif'] ?></td>
                </tr>
                <tr>
                    <td>Contacto</td>
                    <td><?= $proveedor['contacto'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $proveedor['email'] ?></td>
                </tr>
                <tr>
                    <td>Web</td>
                    <td><?= $proveedor['web'] ?></td>
                </tr>
                <tr>
                    <td>Registro</td>
                    <td><?= $proveedor['registro'] ?></td>
                </tr>
                <tr>
                    <td>Teléfono</td><?php foreach ($telefonos as $telefono) : ?><td><?= $telefono['telefono']  . " " ?><?php endforeach ?></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><?= $direccion['calle'] ?? 'no tiene' ?></td>
                    <td><?= $direccion['numero'] ?? 'no tiene' ?></td>
                    <td><?= $direccion['poblacion'] ?? 'no tiene' ?></td>
                    <td><?= $direccion['cp'] ?? 'no tiene' ?></td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>