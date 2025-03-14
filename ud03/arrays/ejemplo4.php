<?php
/**
 * Crea un script que defina un array de números enteros y utilizando una función
 * anónima genere un array con el cuadrado de los mismos.
 */

$aNum = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$cuadradoNum = array_map(function($aNum){
    return $aNum * $aNum;
}, $aNum);
 print_r($cuadradoNum);
?>