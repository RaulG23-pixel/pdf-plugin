<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a{
        text-decoration: none;
        color: #fff;
        padding: 1rem 3rem;
        background: dodgerblue;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        border-radius: 8px;
        margin-right: 10px;
    }
    a:hover{
        background: darkblue;
    }
</style>
<?php
require __DIR__ . "/helpers/create_filenames.php";
?>
<body>
    <h1>Descargar archivo</h1>
    <?php
    if(isset($_GET["file"])){
        $filename = $_GET["file"];
        $path = "uploads". "/" . $filename; ?>
        <a href=<?php echo $path;?> target="_blank">Ver archivo</a>
        <a href=<?php echo $path;?> download>Descargar archivo</a>
    <?php
    }else{ 
        echo '<a href="createPdf.php">Crear archivo</a>';
    } 
    ?>
    
</body>
</html>