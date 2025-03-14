<?php
$aElementos = array("1", 2, "4s", 3, 4);

asort($aElementos);

foreach ($aElementos as $elemento) {
    echo $elemento;
}
echo "<br>";
arsort($aElementos);

foreach ($aElementos as $elemento) {
    echo $elemento;
}
echo "<br>";

$age = array(
    "Peter" => 35,
    "Ben" => 37,
    "Joe" => 43
);

ksort($age);
foreach ($age as $key => $value) {
    echo $key . ":" . $value . "---";

}

echo "<br>";

rsort($age);
    foreach($age as $key => $value){
        echo $key . ":" . $value . "---";
    }

    echo "<br>";


$transport = array('pie', 'bici', 'coche', 'avión');
$mode = current($transport);  // $mode = 'pie';
echo $mode . "--"; 
$mode = next($transport);    // $mode = 'bici';
echo $mode . "--"; 

$mode = current($transport);    // $mode = 'bici';
echo $mode . "--"; 

$mode = prev($transport);    // $mode = 'bici';
echo $mode . "--"; 

$mode = next($transport);    // $mode = 'coche';
echo $mode . "--"; 
$mode = prev($transport);    // $mode = 'bici';
echo $mode . "--"; 
$mode = end($transport);     // $mode = 'avión';
echo $mode;
echo "<br>";

$numeros = array(1, 2, 3, 4, 5, 6, 7, 8);
$resultado = in_array(10, $numeros); // primero lo que se quiere buscar, segundo el array
echo $resultado



?>
