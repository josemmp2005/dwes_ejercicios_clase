<?php
/**
 * Incorpora a tu servidor un mensaje que indique al usuario el tiempo transcurrido 
 * desde su último acceso y un mensaje personalizado en función de éste.
 * Autor: José María Mayén Pérez
 */
   
setcookie("time", time(), time() + 3600 * 24 * 30);

if (isset($_COOKIE["time"])) {
    $ultima_visita = $_COOKIE["time"];
    $tiempo_actual = time();
    $diferencia = $tiempo_actual - $ultima_visita;

    if ($diferencia < 60) {
        echo "¡Bienvenido de nuevo! Te conectaste hace menos de un minuto.";
    } elseif ($diferencia < 3600) {
        $minutos = floor($diferencia / 60);
        echo "¡Bienvenido de nuevo! Te conectaste hace $minutos minutos.";
    } elseif ($diferencia < 86400) {
        $horas = floor($diferencia / 3600);
        echo "¡Bienvenido de nuevo! Te conectaste hace $horas horas.";
    } else {
        $dias = floor($diferencia / 86400);
        echo "¡Bienvenido de nuevo! Te conectaste hace $dias días.";
    }
} else {
    echo "¡Bienvenido! Esta es tu primera visita.";
}
?>