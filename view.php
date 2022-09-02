<?php 
require __DIR__ ."/vendor/autoload.php";
//Importacion de DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;


//Lectura del archivo

$file = fopen("template.php",'r');
$text = fread($file,filesize("template.php"));
fclose($file);

$options = new Options();
$options->set('isRemoteEnabled',true);
$dompdf = new DOMPDF($options);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter','portrait');

$dompdf->loadHtml($text);
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream("document.pdf");
echo $dompdf->output();










