<?php
/**
 * Incluir en vuestro servidor un contador
 * Autor: José María Mayén Pérez
 */


if (!isset($_COOKIE["contador"])) {
    // Si no existe la cookie contador, creamos la cookie
    setcookie("contador", 0, time() +3600);
}else{
    $valor = $_COOKIE["contador"] + 1;
    setcookie("contador", $valor, time() +3600);
}
//Mostamos la cookie
echo $_COOKIE["contador"];
?>