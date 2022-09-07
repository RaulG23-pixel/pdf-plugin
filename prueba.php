<?php
    require_once __DIR__ . "/helpers/generate_html.php";
    require_once __DIR__ . "/data.php";
    require_once __DIR__ . "/database.php";

    $productos = new Model("productos");
    $lista = $productos->getAll();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
</head>
<body>
    <h1>Pruebas de datos dinamicos en tablas</h1>
    <p>Hola mundo</p>
    <?php echo number_format($suma_total,2,',','.'); ?>
</body>
</html>