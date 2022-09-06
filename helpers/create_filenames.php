<?php

/*
    A partir de una secuencia de caracteres la funcion createFilenames toma como parametro la extensión del archivo a crear.
    se inicializa la variable $i con valor 0 ya que servira como punto de partida de la iteracion.
    
    Luego se genera una variable llamada $indexes inicializada con un de texto vacio para su posterior modificacion, utilizando
    un bucle while y tomando la variable $i iniciada en 0, se toma como punto maximo del bucle el numero 30 ya que esa es la
    cantidad de caracteres que se desea colocar en el nombre.

    En cada iteración del bucle se le agrega a la variable $indexes un caracter aleatorio de la variable $chars generando así
    una secuencia de caracteres que se utilizarán como nombre. Finalmente se le agrega a dicho nombre la extensión de archivo a
    utilizar, en este caso PDF.
*/

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

