<?php

function createFilenames($ext){
    $chars = "ABCDEFGHIJKLMNOPQRSTUVabcdefghijklmnopqrstuvwxyz1234567890";

    $i = 0;
    $indexes = "";
    while($i < 30){
        $indexes .= $chars[rand(0,strlen($chars))];
        $i++;
    }
    return $indexes . $ext;
}

