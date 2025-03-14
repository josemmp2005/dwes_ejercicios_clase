<?php
/**
 * Test 1
 * Test para comprobar el manejo del fichero de texto
 * @author Jose Maria Mayén Pérez <a23mapejo@iesgrancapitan.org>
 */

include "./config/config.php";
$desgloseAlumno = array("");
$alumno = "";
$aUsuario = array("");

// Abrimos archivo
$file = fopen("./RegMisAlu.csv", "r");

// Despreciamos línea cabecera
for ($i = 0; $i < LINE_CABECERA; $i++) {
    fgets($file);
}

// Recorremos el fichero mostrando los alumnos hasta feof
while (!feof($file)) {
    $alumno = fgets($file);
    $alumnoSt = str_replace($caracteresBusqueda, $caracteresRemplaza, $alumno);
    $alumnoMin = strtolower($alumnoSt); // Convertimos a minúsculas
    $desgloseAlumno = explode(" ", $alumnoMin);
    $nombreUsuario = substr($desgloseAlumno[0], 0, 2).substr($desgloseAlumno[1], 0, 2).substr($desgloseAlumno[2], 0, 2);
    // Añadimos al array los usuario

    // Inicializamos un contador para manejar duplicados
    $contador = 1;
    $nuevoNombreUsuario = $nombreUsuario;
    
    // Usamos un while para verificar si el nombre ya existe y generar uno nuevo si es necesario
    while (in_array($nuevoNombreUsuario, $aUsuario, true)) {
        $nuevoNombreUsuario = $nombreUsuario . $contador;
        $contador++;
    }
    
    // Agregamos el nombre único generado
    array_push($aUsuario, $nuevoNombreUsuario);
}
foreach($aUsuario as $value){
    echo $value;
    echo "<br/>";
}

fclose($file);
?>
    