<?php
use Dompdf\Dompdf;
require_once '../../dompdf/autoload.inc.php';

$dompdf = new Dompdf();

ob_start();
require_once 'template1.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('cv.pdf');