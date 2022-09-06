<?php
    require_once __DIR__ . "/helpers/generate_html.php";
    require_once __DIR__ . "/data.php";
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
    <?php
        $tables = generateTable($data);
        echo $tables;
    ?>
</body>
</html>