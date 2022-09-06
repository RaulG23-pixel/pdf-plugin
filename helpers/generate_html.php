<?php
function generateTable($data){
    $chunk = array_chunk($data,5);
    $page_break = count($data) > 3 ? 'page_break' : '';
    $i = 0;
    $table = '';   

    while($i < count($chunk)){
        $table .= '
        <table class=' . $page_break .'>
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
        $tbody = generateRow($chunk[$i]);
        $table .= $tbody;
        $i++;
    }
    $table .= '</table>';
    return $table;
    
}

function generateRow($data){
    $j = 0;
    $tbody = '';
    while($j <  count($data)){
        $tbody .= "
        <tbody class='table-body'>
                <tr>
                    <td class='table-data-item'>". $data[$j]['item'] . "</td>
                    <td class='table-data-model'>". $data[$j]['model'] . "</td>
                    <td class='table-data-image'>
                        <div class='table-img-container'>
                            <img src=" . $data[$j]['imagen'] . ">
                        </div>
                    </td>
                    <td class='table-data-description'>" . $data[$j]['descripcion'] . "</td>
                    <td class='table-data-cant'>" . $data[$j]['cantidad'] . "</td>
                    <td class='table-data-un'>" . $data[$j]['unidad'] . "</td>
                    <td class='table-data-valor_un'>" . $data[$j]['valor_unitario'] . "</td>
                    <td class='table-data-valor_total'>25.692,002$</td>
                </tr>
        </tbody>";
        $j++;
    }

    return $tbody;

}