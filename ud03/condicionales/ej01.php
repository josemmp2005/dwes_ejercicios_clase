<!-- Almacena tres números en variables y escribirlos en pantalla de manera ordenada.
 Author: José María Mayén Pérez 
 Date: 26/09/2024-->
<?php
    $a = 1;
    $b = 2;
    $c = 3;

    if (($a > $b) && ($a > $b)) {
        if ($b > $c) {
            echo "$a, $b, $c";
        } else {
            echo "$a, $c, $b";
        }
    } else if (($b > $a) && ($b > $c)) {
        if ($a > $c) {
            echo "$b, $a, $c";
        } else {
            echo "$b, $c, $a";
        }
    } else if (($c > $a) && ($c > $b)) {
        if ($a > $b) {
            echo "$c, $a, $b";
        } else {
            echo "$c, $b, $a";
        }
    }
?>
