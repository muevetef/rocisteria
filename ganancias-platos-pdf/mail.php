<?php

$to = 'test@gmail.com';
$subjet = "Ejemplo de email";
$message = "soy un email de ejemplo ";
$headers = 'From: webmaster@example.com'. "\r\n".
        'Reply-To: webmaster@example.com'. "\r\n".
        'X-Mailer: PHP/' . phpversion();
mail($to,$subjet,$message,$headers);