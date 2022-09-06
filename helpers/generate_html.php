<?php
    require __DIR__ . "/get_modifiable_parts.php";

/*
    Genera una tabla a partir de los datos suministrados en el parametro $data, dicho parametro o conjunto de datos, se divide
    a partir de la función array_chunk la cual genera secciones de 5 elementos por seccion, de esta forma se garantiza una mejor manipulación de
    los datos.

    Se genera la variable $page_break la cual le proporcionará a la tabla la clase 'page_break' en caso de que el conjunto de datos suministrado
    sea mayor a 3 elementos, esto con el fin de divir la cantidad de elementos mostrados en cada tabla.

    Se inicializan las variables $i con valor 0 y $table con valor de texto vacio. Posteriormente, a través de un bucle while utilizando como
    punto de partida la variable $i = 0 y la cantidad de secciones generadas anteriormente, se itera en el bucle sección a sección y se añade a la variable $table
    el texto de las columas a generar, luego utilizando la funcion generateRows y proporcionandole los datos segun en que sección se encuentre el bucle, se generan las filas con los datos 
    suministrados. Finalmente se almacenan en la variable $tbody y se añaden a la tabla integrandole a su vez la etiqueta de cierre
    final de la tabla.
*/

function generateTable($data, $activateClass = false){
    $table = '';   

        $table .= '
        <table>
            <thead class="table-header">
                <tr>
                    <th>Item</th>
                    <th>Model</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Cant</th>
                    <th>Unid</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                </tr>
            </thead>';
        if($activateClass){
            $tbody = generateRows($data,$activateClass);
        }else{
            $tbody = generateRows($data);
        }
        $table .= $tbody;
        $table .= '</table>';

    return $table;
    
}
function generatePage($data){
    $chunk = array_chunk($data,5);
    $i = 0;
    $header = getPageheader();
    $authors = getPageAuthors();
    $logistica = getLogisticData();
    $footer = getPageFooter();
    $pages = '';
    while($i < count($chunk)){
        $pages .= '<div class="pagina2 page page-marker">';
        $pages .= $header;
        $pages .= $authors;
        if(count($chunk) - 1 == $i){
            $table = generateTable($chunk[$i], true);
        }else{
            $table = generateTable($chunk[$i]);
        }
        
        $pages .= $table;

        if(count($chunk) - 1 === $i){
            $pages .= $logistica;
        }

        $pages .= $footer;
        $pages .= '</div>';
        $i++;
    }
    
    return $pages;
}


/*
    Genera filas de datos a partir del paramentro $data, se inicializan la variable en $j y la variable $tbody, utilizando un bucle while
    y tomando como punto de partida la variable $j y como limite la cantidad de datos que posea el parametro $data, se generan las filas de cada
    conjunto de datos y se organizan los datos en sus espectivas columnas, dicho orden de columnas y filas se agregan a la variable $tbody.
    
    Al finalizar el bucle se añade la etiqueta de cierre de la variable $tbody. Finalmente se retorna la variable $tbody con todos los datos de las
    filas de datos.   
*/

function generateRows($data, $useClassName = false){
    $j = 0;
    $tbody = "<tbody class='table-body'>";
    $classname = $useClassName ? 'end' : '';
    while($j <  count($data)){
        $tbody .= "
                <tr>
                    <td class='table-data-item'>". $data[$j]['item'] . "</td>
                    <td class='table-data-model'>". $data[$j]['model'] . "</td>
                    <td class='table-data-image'>
                        <div class='table-img-container" . ' ' . $classname ."'>
                            <img src=" . $data[$j]['imagen'] . ">
                        </div>
                    </td>
                    <td class='table-data-description'>" . $data[$j]['descripcion'] . "</td>
                    <td class='table-data-cant'>" . $data[$j]['cantidad'] . "</td>
                    <td class='table-data-un'>" . $data[$j]['unidad'] . "</td>
                    <td class='table-data-valor_un'>" . $data[$j]['valor_unitario'] . "</td>
                    <td class='table-data-valor_total'>25.692,002$</td>
                </tr>";
        $j++;
    }

    $tbody .= "</tbody>";
    return $tbody;

}
function generateHtml($data,$filename){
    $file = fopen($filename, 'r');
    $html = fread($file,filesize($filename));
    fclose($file);

    $pattern = "/%content%/";
    $pages = generatePage($data);
    $new_html = preg_replace($pattern,$pages,$html);

    return $new_html;
}