<?php
require '../database.php';
//Si llegan datos por post se tratan
//Se insertan en la bdd
//sinó llegan datos se muestra el formulario
//si todo va bién hacemos una redirección a index

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id = trim(htmlspecialchars($_POST['id']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));

    $sql = 'INSERT INTO categorias (id_categoria, categoria) VALUES (:id, :categoria)';
    $stmt = $pdo->prepare($sql);

    $params = [
        'id' => $id,
        'categoria' => $categoria
    ];

    $stmt->execute($params);

    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nuevo Post</title>
</head>

<body class="bg-gray-11">
    <header class="bg-pink-500 text-purple p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Rocisteria proyecto en grupo</h1>
        </div>
    </header>
    <div class="flex justify-center mt-10">
        <div class="bg-purple p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-semibold mb-6">Categorías</h1>
            <form action="#" method="post">
                <div class="mb-4">
                    <label for="title" class="block text-purple-700 font-medium">Id</label>
                    <input type="text" id="id" name="id" placeholder="id" class="w-full px-4 py-2 border rounded focus:ring focus:ring-purple-300 focus:outline-none">
                </div>
                <div class="mb-6">
                    <label for="categoria" class="block text-purple-700 font-medium">Categoría</label>
                    <textarea id="categoria" name="categoria" placeholder="Escribe la categoria..." class="w-full px-4 py-2 border rounded focus:ring focus:ring-purple-300 focus:outline-none"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-white-600 focus:outline-none">Enviar</button>
                    <a href="index.php" class="text-purple-500 hover:underline">Ir a Index.php</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
