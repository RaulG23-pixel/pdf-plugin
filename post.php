<?php 

//Importacion de DOMPDF
require __DIR__ "./vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Exception;
use Dompdf\Options;

//Lectura del archivo
$filename = __DIR__ . "/template.php";

$file = fopen($filename,'r');
$text = fread($file, filesize($filename));
fclose($file);

/*$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );

$dompdf->loadHtml($text);
$dompdf->setPaper("letter");


$dompdf->render();
$dompdf->stream("document.pdf");*/
echo $text;

?>





