<?php
//recibe el id del post a eliminar por POST
//y ejecuta la consulta
//redirige al index

require '../database.php';

$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['_method'] ?? '' === 'delete');

if ($isDeleteRequest) {
    $id_categoria = $_POST['id_categoria'];

    $sql = 'DELETE FROM categorias WHERE id_categoria = :id_categoria';

    $stmt = $pdo->prepare($sql);
   
    $stmt->execute(['id_categoria' => $id_categoria]);

    header('Location: index.php');
    exit;
}
