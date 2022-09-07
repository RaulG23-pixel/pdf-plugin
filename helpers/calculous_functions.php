<?php
function generateTotal($array){
    $suma_total = 0;
    $i = 0;

    while($i < count($array)){
        $suma_total += (int) $array[$i]["valor_unitario"];
        $i++;
    }
    return $suma_total;
}