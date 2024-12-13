<?php
/**
 * Script con las funciones generales para nuestro proyecto
 * @author = José María Mayén Pérez
*/

/**
 * Funcion para limpiar los datos de entrada
 * @param mixed $data
 * @return string
*/
function clearData($data){
    $data = trim($data); // Para quitar los espacios
    $data = stripslashes($data);
    $data = htmlspecialchars($data); // Para quitar los caracteres html speciales
    return $data;
}
?>