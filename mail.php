<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ssubmit'])) {
        $to = trim(htmlspecialchars($_POST['to']));
        $subject = trim(htmlspecialchars($_POST['title']));
        $message = trim(htmlspecialchars($_POST['message']));
        $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        mail($to, $subject, $message, $headers);
        header('Location: index.php');
        exit;
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <style>
                a {
                        text-decoration: none;
                }

                #map {
                        height: 280px;
                }
        </style>
</head>

<body>
        <h1 class="text-center font-monospace mt-4">Contacta con Nosotros</h1>
        <div class="container-sm">
                <form action="#" method="post">

                        <label for="to" class="form-label">Email:</label>
                        <input type="email" name="to" id="to" class="form-control" required>

                        <label for="title" class="form-label">Titulo:</label>
                        <input type="text" name="title" id="title" class="form-control">

                        <label for="message" class="form-label">Mensaje:</label>
                        <textarea type="text" name="message" id="message" class="form-control"></textarea>
                        <div class="mt-4 d-flex align-items-center gap-2">
                                <button type="submit" name="ssubmit" class="btn btn-primary">Enviar</button>
                                <a href="./index.php" class="link-opacity-100-hover">Volver</a>
                        </div>
                </form>
        </div>
        <div id="map" class="container mt-5 "></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
        const map = L.map("map").setView([39.57301, 2.66174], 20);
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        L.marker([39.57301, 2.66174]).addTo(map).bindPopup("Estamos aquí").openPopup();
</script>

</html>