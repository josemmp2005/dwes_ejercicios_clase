<?php
/**
 * Array multidimensional:
 * Crea un array multidimensional con al menos 3 estudiantes y sus
 * respectivas notas. Luego imprime cada estudiante con su promedio.
 */

 $estudiantes = [
    [
        'nombre' => 'Ana García',
        'notas' => [8.5, 9.0, 7.5]
    ],
    [
        'nombre' => 'Carlos Pérez',
        'notas' => [6.0, 7.0, 5.5]
    ],
    [
        'nombre' => 'María López',
        'notas' => [9.5, 9.0, 10.0]
    ]
];
$promedio = 0;  


foreach($estudiantes as $estudiante){
    $cont = 0;
    foreach($estudiante["notas"] as $nota){
        $promedio += $nota;
        $cont ++;
    }
    echo round($promedio / $cont, 2);
    echo "<br/>";
}