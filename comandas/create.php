<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $fecha = date('Y-m-d'); // Genera la fecha actual
    $mesa = $_POST['mesa'];
    $comensales = $_POST['comensales'];
    $hora = date('H:i:s'); // Genera la hora actual
    $ticket = $_POST['ticket'];

    $sql = "SELECT MAX(id_comanda) AS max_id FROM comandas";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$max_id = $row['max_id'];

// Generar el próximo id_comanda
$id_comanda = $max_id + 1;

    // Crear la consulta SQL
    $sql = "INSERT INTO comandas (id_comanda, fecha, mesa, comensales, hora, ticket) VALUES (:id_comanda, :fecha, :mesa, :comensales, :hora, :ticket)";
    // Ejecutar la consulta y manejar errores
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_comanda', $id_comanda);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':mesa', $mesa);
        $stmt->bindParam(':comensales', $comensales);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':ticket', $ticket);
        $stmt->execute();
        header('Location: comandas.php');
        exit();
    } catch (PDOException $e) {
        echo "Error al insertar la comanda: " . $e->getMessage();
    }
}

$conn = null; // Cerramos la conexión
?>
