<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_comanda = $_POST['id'];

    $sql = "DELETE FROM comandas WHERE id_comanda = :id_comanda";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_comanda' => $id_comanda]);

    header("Location: comandas.php");
}
?>