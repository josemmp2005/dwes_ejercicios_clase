<?php
/**
 * Ejemplo de usos de funciones anonimas
 * author: José María Mayén Pérez
 * date:03/10/2024
 */
$aPaises = array(
    array('id' => 'es', 'pais' => 'España', 'capital' => 'Madrid'),
    array('id' => 'it', 'pais' => 'Italia', 'capital' => 'Roma'),
    array('id' => 'fr', 'pais' => 'Francia', 'capital' => 'Paris'),
    );

    echo "Opción 1<br/>";
    $nombrePaises = array();
    foreach ($aPaises as $pais) {
    $nombrePaises[] = $pais['pais'];
    }
    print_r ($nombrePaises);
    echo "<br/>Opción 2<br/>";
    
    $nombrePaises = array_map(function ($pais) {
    return $pais['pais'];
    }, $aPaises);
    print_r($nombrePaises);
   

?>
