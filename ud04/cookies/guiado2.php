<?php
/**
 * Borrar la cookie
 * Autor: 
 */


if(isset($_COOKIE["cookie"])){
    setcookie("cookie", "hola mundo", time() -60);
    echo "Cookie borrada";
}


?>