<!-- Carga en variables mes y año e indica el número de días del mes. Utiliza la
estructura de control switch
Author: José María Mayén Pérez 
Date: 26/09/2024- -->
<?php
$mes = 2;
$ano = 2024;

switch($mes) {
    case 1:
    case 3: 
    case 5: 
    case 7:
    case 8: 
    case 10: 
    case 12: 
        echo "31 días";
        break;

    case 4: 
    case 6: 
    case 9: 
    case 11: 
        echo "30 días";
        break;

    case 2: 
        if ($ano % 4 == 0 && ($ano % 100 != 0 || $ano % 400 == 0)) {
            echo "29 días";
        } else {
            echo "28 días";
        }
        break;

    default:
        echo "Mes no válido";
}
?>
