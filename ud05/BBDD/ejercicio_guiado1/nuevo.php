<?php

include("lib/function.php");

if(isset($_POST['enviar'])){

$nombre = clearData($_POST['nombre']);
$peso = clearData($_POST['peso']);    
$raza = clearData($_POST['raza']);    

$db = conectaDB();
$sql = "insert into perros(nombre,peso,raza) values(:nombre,:peso,:raza)";
$consulta = $db -> prepare($sql);
$consulta -> execute(array(
                            ":nombre" => $nombre,
                            ":peso" => $peso,
                            ":raza" => $raza));

header("Location: mascotas.php");
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br/>
    <h1>GESTIÓN MASCOTAS</h1>

    <h2>Nueva mascota</h2>

    <form action="" method="post">

        Nombre <input type="text" name="nombre" id="nombre">
        Peso   <input type="text" name="peso" id="peso">
        Raza   <input type="text" name="raza" id="raza">

        <input type="submit" value="enviar" id="enviar" name="enviar">

    </form>
</body>
</html>
