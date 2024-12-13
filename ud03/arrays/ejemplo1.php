<?php
/**
 * Dias de la semana en un array
 */

 // Definir en un array los dias de la semnana
$diasSemana = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

 //Calculamos el tamaño del array
$numeroDias =  count ($diasSemana);


//Recorremos el array
for ($i = 0; $i < $numeroDias; $i++) {
    echo $diasSemana[$i];
    echo '<br/>';
}

?>
