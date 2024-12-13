<?php
    $file = fopen( "prueba.txt", "w" ) or exit("Unable to open file!");
    $txt = "Hola\n\tCaracola";
    fwrite($file , $txt);
    $file = fopen("prueba.txt", "r") or exit("Unable to open file!");
    while( !feof($file) ) {
        echo fgets($file). "<br/>";
    }

    fclose($file);

    $file = fopen("prueba.txt", "r") or exit("Unable to open file!");
    $buffer = fread($file,filesize("prueba.txt"));
    echo $buffer;

    fclose($file);

?>