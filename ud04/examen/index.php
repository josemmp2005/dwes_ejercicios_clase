<?php
/**
 * 
 * @author José María Mayén Pérez <email>
 */

 require_once("conf/conf.php");

// var_dump($aCartas);
// echo "<br>";    

// var_dump(end($aCartas));

session_start();


if(!isset($_SESSION["baraja"])){
    $_SESSION["baraja"] = $aCartas;
    shuffle($_SESSION["baraja"]);
}


foreach($_SESSION["baraja"] as $value => $key){
    echo $value . "=>" . $key . "<br>";
}

// var_dump($aCartas);

echo "<br>";
echo "<br>";
$_SESSION["cartasJugador"] = array();
$_SESSION["cartasMaquina"] = array();

while(count($_SESSION["cartasJugador"]) <= 2){
    $carta = array_pop($_SESSION["baraja"]);
    $carta = array_push($_SESSION["cartasJugador"], $carta);
}

while(count($_SESSION["cartasMaquina"]) <= 2){
    $carta = array_pop($_SESSION["baraja"]);
    $carta = array_push($_SESSION["cartasMaquina"], $carta);
}


$numAleatorioBanca = random_int(17, 21);


echo "Cartas Juagador";
var_dump($_SESSION["cartasJugador"]);
echo "<br>";
echo "Cartas Maquina";
var_dump($_SESSION["cartasMaquina"]);

// var_dump($aCartas);


//Turno Jugador
if(!isset($_POST["plantarse"])){
   if(isset($_POST["pedir"])){
    $carta = array_pop($_SESSION["baraja"]);
    $carta = array_push($_SESSION["cartasJugador"], $carta);
    // var_dump($cartasJugador);
    }
//Turno Maquina
}else{
    echo "Jugador se ha plantado";
    foreach($_SESSION["cartasMaquina"] as $key => $value){
        echo $key . "-";
        echo $value;
        echo "<br>";
    }
    $carta = array_pop($_SESSION["baraja"]);
    $carta = array_push($_SESSION["cartasMaquina"], $carta);
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
    <a href="salida.php">cerrar</a>
    <form action="" method="post">
        <button type="submit" name="pedir">Pedir</button>
        <button type="submit" name="plantarse">Plantarse</button>
    </form>
</body>
</html>