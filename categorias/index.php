<?php
require '../database.php';

//Preparar la consulta
$stmt = $pdo->query('SELECT * FROM categorias');

//ejecutamos la consulta
// $stmt->execute();

//Obenemos los resultados
$categorias= $stmt->fetchAll();

// echo "<pre>";
// var_dump($posts);
// echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Categorías</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>


<body>

<div class="container mt-3">
  <h2>Categorías</h2>
  <p>Tabla de Categorías</p>            
  <table class="table table-bordered" style="border-color:purple;border-width: 2px; border-style: solid;">

    <thead>
      <tr>
        
        <th>id</th>
        <th>categoria</th>
      </tr>
    </thead>
    <tbody><?php foreach ($categorias AS $categoria): ?>
      <tr>
        <td><?= $categoria['id_categoria']?></td>
        <td><?= $categoria['categoria']?></td>
      </tr>
    
     <?php endforeach ?>
    </tbody>
  </table>
  
                <div class="flex items-center justify-between">
                   
                    <a href="form.php" class="text-blue-500 hover:underline">Ir a formulario</a>
                </div>
            

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
