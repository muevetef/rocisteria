<?php
//recibe el id del post a eliminar por POST
//y ejecuta la consulta
//redirige al index

require '../database.php';

$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['_method'] ?? '' === 'delete');

if ($isDeleteRequest) {
    $alergeno = $_POST['alergeno'];

    $sql = 'DELETE FROM alergenos WHERE alergeno = :alergeno';

    $stmt = $pdo->prepare($sql);
   
    $stmt->execute(['alergeno' => $alergeno]);

    header('Location: index.php');
    exit;
}
