<?php

require_once("conf/conf.php");

// var_dump($aCartas);
// echo "<br>";    

// var_dump(end($aCartas));

session_start();



if(!isset($_SESSION["baraja"])){
    $_SESSION["baraja"] = $aCartas;
    var_dump($_SESSION["baraja"]);
    shuffle($_SESSION["baraja"]);
    var_dump($_SESSION["baraja"]);
    echo $_SESSION["baraja"]["2_of_clubs"];

}


// foreach($_SESSION["baraja"] as $key => $value){
//     echo $key . "=>" . $value . "<br>";
// }