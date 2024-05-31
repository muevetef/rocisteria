<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('./img/amanda-lim-e_A-SFvqV08-unsplash.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        .navbar {
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#" style="color: white; font-weight: bold;">La Rosticeria</a>        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a href="./categorias/index.php" class="nav-item nav-link"><button type="button" class="btn btn-primary btn-md">Categorías</button></a>
                <a href="./comandas/comandas.php" class="nav-item nav-link"><button type="button" class="btn btn-secondary btn-md">Comandas</button></a>
                <a href="./compras/index.php" class="nav-item nav-link"><button type="button" class="btn btn-success btn-md">Compras</button></a>
                <a href="./productos/index.php" class="nav-item nav-link"><button type="button" class="btn btn-danger btn-md">Productos</button></a>
                <a href="./proveedores/index.php" class="nav-item nav-link"><button type="button" class="btn btn-warning btn-md">Proveedores</button></a>
                <a href="#" class="nav-item nav-link"><button type="button" class="btn btn-info btn-md">Platos</button></a>
                <a href="#" class="nav-item nav-link"><button type="button" class="btn btn-dark btn-md">Donaciones</button></a>

            </div>
        </div>
    </nav>
</body>

</html>