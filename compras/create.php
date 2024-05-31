<?php
// Include the database connection file
require '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_producto = $_POST['codigo_producto'];
    $nif = $_POST['nif'];
    $fecha = $_POST['fecha'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $iva = $_POST['iva'];
    $caducidad = $_POST['caducidad'];

    // Check if codigo_producto exists in productos table
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM productos WHERE codigo_producto = :codigo_producto");
    $stmt->bindParam(':codigo_producto', $codigo_producto);
    $stmt->execute();
    $productExists = $stmt->fetchColumn();

    if ($productExists) {
        // Insert into compras_producto if codigo_producto exists
        $sql = "INSERT INTO compras_producto (codigo_producto, nif, fecha, cantidad, precio, iva, caducidad) 
                VALUES (:codigo_producto, :nif, :fecha, :cantidad, :precio, :iva, :caducidad)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':codigo_producto', $codigo_producto);
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':iva', $iva);
        $stmt->bindParam(':caducidad', $caducidad);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $pdo->errorInfo();
        }
    } else {
        echo "Error: Código Producto no existe en la tabla de productos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Añadir Compra</h1>
        <form method="post" action="create.php">
            <div class="mb-3">
                <label for="codigo_producto" class="form-label">Código Producto</label>
                <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" required>
            </div>
            <div class="mb-3">
                <label for="nif" class="form-label">NIF</label>
                <input type="text" class="form-control" id="nif" name="nif" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="iva" class="form-label">IVA</label>
                <input type="text" class="form-control" id="iva" name="iva" required>
            </div>
            <div class="mb-3">
                <label for="caducidad" class="form-label">Caducidad</label>
                <input type="date" class="form-control" id="caducidad" name="caducidad" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
            <a href="index.php">Volver</a>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</body>
</html>
