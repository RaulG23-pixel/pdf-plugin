<?php 

//Importacion de autoload y de helpers a utilizar
require __DIR__. "/vendor/autoload.php";
require __DIR__. "/helpers/create_filenames.php";
require __DIR__. "/helpers/generate_html.php";
require __DIR__. "/database.php";

//Importacion de DOMPDF
use Dompdf\Dompdf;
use Dompdf\Options;


//Lectura del archivo, se almacena el contenido del archivo en la variable $text
$model = new Model("productos");
$data = $model->getAll();
$html = generateHtml($data,"template_uso.php");


$options = new Options();

//isRemoteEnabled permite la implementación de imagenes en el archivo
$options->set('isRemoteEnabled',true);
$dompdf = new DOMPDF($options);


$dompdf->setPaper('letter','portrait');
$dompdf->loadHtml($html);
$dompdf->render();


$filename = createFilenames(".pdf");
$path = __DIR__ . "/uploads/$filename";

//Genera y retorna los contenidos del archivo PDF, se almacena todo en la variable $output
$output = $dompdf->output();

//Genera el archivo y lo mueve a la dirección asignada
file_put_contents($path,$output);

//Si el archivo existe se redirecciona al panel del usuario para su visualización o descarga
if(file_exists($path)){
    header("location:" . "index.php?success=1&file=$filename");
}










