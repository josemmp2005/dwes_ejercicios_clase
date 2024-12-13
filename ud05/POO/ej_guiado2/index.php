<?php
/**
 * Probamos la clase contador
 * 
 * @author José María Mayén Pérez <email> 
 */

 //Requerimos el contador
require_once "Contador.php";

$nInstancias = Contador::nInstancias();

echo $nInstancias;
echo "<br>";

// Creamos varios contador
$contador1 = new Contador();
$contador2 = new Contador(100);
$contador3 = new Contador(20);

// Mostramos los valores de los contadores

echo $contador1;
echo "<br>";
echo $contador2;
echo "<br>";

$contador1->contar();
$contador1->contar();

$contador2->contar();
$contador2->contar();

echo $contador1;
echo "<br>";
echo $contador2;
echo "<br>";

$nInstancias = Contador::nInstancias();
echo $nInstancias;



?>