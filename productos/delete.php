<?php
require '../database.php';
//Si llegan datos por post se tratan
//Se insertan en la bdd
//sinó llegan datos se muestra el formulario
//si todo va bién hacemos una redirección a index
$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && 
            ($_POST['_method'] ?? '' === 'delete');
            
if ($isDeleteRequest) {

    $id = $_POST['id'];
    $sql = 'DELETE FROM productos WHERE codigo_producto = :id';
    $stmt = $pdo->prepare($sql);

    $params = [
        'id' => $id,
    ];

    $stmt->execute($params);

    header('Location: index.php');
}