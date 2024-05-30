<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_comanda = $_POST['id'];
    $mesa = $_POST['mesa'];
    $comensales = $_POST['comensales'];
    $ticket = $_POST['ticket'];

    $sql = "UPDATE comandas SET mesa = :mesa, comensales = :comensales, ticket = :ticket WHERE id_comanda = :id_comanda";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mesa' => $mesa, 'comensales' => $comensales, 'ticket' => $ticket, 'id_comanda' => $id_comanda]);

    header("Location: comandas.php");
}
?>