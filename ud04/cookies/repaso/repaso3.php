<?php
/**
 * Ejercicio 3: Contador de visitas
 * Descripción: Crea un script que cuente cuántas veces un usuario ha visitado tu página. Usa cookies para almacenar el número de visitas.

 * Instrucciones:
 * Usa una cookie para almacenar el número de visitas del usuario.
 * Si la cookie no existe, significa que es la primera vez que el usuario visita la página.
 * Cada vez que el usuario acceda a la página, incrementa el contador de visitas.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

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
</body>
</html>