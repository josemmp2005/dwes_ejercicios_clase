<!-- Sumar los 3 primeros números pares.
Author: Jose Maria Mayen Perez
Date: 27/09/2024 -->
<?php
$i = 0; 
$cont = 0;  
$suma = 0;  

while($cont < 3) {  
    if($i % 2 == 0) {  
        $suma += $i;  
        $cont++;  
    }
    $i++;
}
echo $suma

?>
