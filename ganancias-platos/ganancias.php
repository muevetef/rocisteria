<?php
require '../database.php';
require '../vendor/autoload.php';

$sql = 'SELECT plato.nombre AS nombre, sum(ig.cant_bruta*p.precio_compra) AS coste, plato.pvp AS precio, plato.pvp-sum(ig.cant_bruta*p.precio_compra)  AS ganancia
FROM platos plato
INNER JOIN ingredientes_plato ig ON plato.codigo_plato = ig.codigo_plato
INNER JOIN productos p ON ig.codigo_producto = p.codigo_producto
GROUP BY plato.nombre, plato.pvp
ORDER BY plato.pvp-sum(ig.cant_bruta*p.precio_compra) DESC;';

$stmt = $pdo->prepare($sql);
$stmt->execute();
$ganancias = $stmt->fetchAll();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->setAuthor('Tamara');
$pdf->setTitle('Ganancias');
$pdf->setSubject('TCPDF Test');
$pdf->setKeywords('TCPDF, PDF, example, test, ganancias');

// set default header data

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>Ganancias</h1>

<table>
<thead>
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Coste</th>
        <th scope="col">PvP</th>
        <th scope="col">Ganancias</th>
    </tr>
</thead>
<tbody>
EOD;

foreach ($ganancias as $plato){
$html .= "<tr><th scope='row'>".$plato['nombre'] ."</th><td>". number_format($plato['coste'], 2) ." €</td><td>". number_format($plato['precio'],2)." €</td><td>" .number_format($plato['ganancia'],2) ." €</td></tr>";
};

$html .= "</tbody>
</table>";


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('ganancias.pdf', 'I');
