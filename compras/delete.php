<?php
require '../database.php';

$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['_method'] ?? '' === 'delete');

if ($isDeleteRequest) {
    $id = $_POST['id'];

    $sql = 'DELETE FROM compras_producto WHERE codigo_producto = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['id' => $id]);

    header('Location: index.php');
    exit;
}
?>