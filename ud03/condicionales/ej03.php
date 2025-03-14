<!-- Carga fecha de nacimiento en variables y calcula la edad.
Author: José María Mayén Pérez 
Date: 26/09/2024- -->
<?php
    $dia = 9;
    $mes = 11;
    $ano = 2005;

    $dia_actual = date("j");
    $mes_actual = date("n");
    $ano_actual = date("Y");

    $edad = $ano_actual - $ano;

    if (($mes_actual < $mes) || ($mes_actual == $mes && $dia_actual < $dia)) {
        $edad -= 1;
    }

    echo "$edad";
?>