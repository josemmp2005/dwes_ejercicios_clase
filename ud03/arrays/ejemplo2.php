<?php
/**
 * Array Asociativo numero de dias del mes
 * 
 * 
 * 
 */
$meses = array("Enero"=>31,
                "Febrero"=>array(28, 29),
                "Marzo"=>31,
                "Abril"=>30,
                "Mayo"=>31,
                "Junio"=>30,
                "Julio"=> 31,
                "Agosto"=>31,
                "Septiembre"=> 30,
                "Octubre"=>31,
                "Nobiembre"=> 30,
                "Diciembre"=> 31);

$anno = date("Y");


foreach ($meses as $key => $value) {
    if ($mes == "Febrero"){
        if (($anno % 4 == 0 && $anno % 100 != 0) || ($anno % 400 == 0)) {
            echo "$mes tiene 29 días en el año $anno<br/>";
        } else {
            echo "$mes tiene 28 días en el año $anno<br/>";
        }
    } else {
        echo "$mes tiene $dias días<br/>";
    }
}
?>

