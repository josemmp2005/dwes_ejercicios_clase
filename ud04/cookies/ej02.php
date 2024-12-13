<?php
/**
 * Escriba una página que compruebe si el navegador permite crear cookies y se 
 * lo diga al usuario (mediante una o más páginas).
 * Autor: José María Mayén Pérez
 */
$cookie_name = "prueba";

// Establecer la cookie
setcookie($cookie_name, "test", time() + 60); 

// Comprobar si la cookie está configurada
if (isset($_COOKIE[$cookie_name])) {
    echo "<h1>Las cookies están habilitadas en tu navegador.</h1>";

} else {
    echo "<h1>Las cookies están deshabilitadas en tu navegador.</h1>";
}

// Eliminar la cookie de prueba al final
setcookie($cookie_name, "", time() -60);
?>
