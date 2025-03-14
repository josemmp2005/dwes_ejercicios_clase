<?php

include("lib/function.php");

// Probar la conexión
$db = conectaDB();
$nombre = "Firulais";
$sql = "insert into perros(nombre) values('". $nombre ."')";
if($db->query($sql)) {
    echo "ok";
} else {
    echo "no";
}

?>
