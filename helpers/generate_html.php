<?php
function generateTable($data){
    $chunk = array_chunk($data,5);
    $page_break = count($data) > 3 ? 'page_break' : '';
    $i = 0;
    $table = "";
    while($i < count($chunk))
    $table .= '<table class=<?php echo $page_break;?>>
                <thead class="table-header">
                    <tr>
                        <th>Item</th>
                        <th>Model</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Cant</th>
                        <th>Unid</th>
                        <th>Valor Unitario</th>
                        th>Valor Total</th>
                    </tr>
                </thead>';
}

function generateRow($data){

}