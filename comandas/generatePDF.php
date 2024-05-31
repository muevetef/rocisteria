<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . '/../vendor/tecnickcom/tcpdf/tcpdf.php');

function obtenerComandas() {
    // Configuración de la base de datos
    $host = 'localhost';
    $db   = 'rocisteria';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Cadena de conexión
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // Opciones de PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // Crear una nueva conexión PDO
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Consulta SQL para obtener las comandas
    $sql = "SELECT * FROM comandas";

    // Preparar la consulta SQL
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta
    $stmt->execute();

    // Devolver los resultados
    return $stmt->fetchAll();
}
// Crear una nueva instancia de PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer los márgenes del documento
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);



// Establecer el encabezado y el pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establecer el encabezado y el pie de página
$pdf->SetHeaderData('', 0, 'LA ROSTICERIA', 'Comandas');
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// Establecer el tipo de letra
$pdf->SetFont('helvetica', '', 9);

// Añadir una página
$pdf->AddPage();

// Obtener los datos de la tabla
$comandas = obtenerComandas(); // Esta función debe devolver los datos de las comandas

// Crear la tabla en HTML
$html = '<table border="1" cellspacing="3" cellpadding="4">
    <tr>
        <th>ID Comanda</th>
        <th>Fecha</th>
        <th>Mesa</th>
        <th>Comensales</th>
        <th>Hora</th>
        <th>Ticket</th>
    </tr>';

foreach ($comandas as $comanda) {
    $html .= '<tr>
        <td>'.$comanda['id_comanda'].'</td>
        <td>'.$comanda['fecha'].'</td>
        <td>'.$comanda['mesa'].'</td>
        <td>'.$comanda['comensales'].'</td>
        <td>'.$comanda['hora'].'</td>
        <td>'.$comanda['ticket'].'</td>
    </tr>';
}

$html .= '</table>';

// Escribir el HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('comandas.pdf', 'I');
?>