<?php
define("LINE_CABECERA", 1);
define("A_INICIO", 2010);
define("A_FINAL", 2030);

define("DIRUPLOAD", 'upload/'); //Directorio para la subida de los archivos
define("MAXSIZE", 200000); // Tamaño maximo de archivos
$allowedExts = array("csv");
$allowedFormat = array("text/csv");

$caracteresBusqueda = array("Á","á","É","é","Í","í","Ó","ó","Ü","ü","Ú","ú","ñ","Ñ",",","\"");
$caracteresRemplaza = array("A","a","E","e","I","i","O","o","U","u","U","u","n","N","","");
$cursos = array("1 DAW", "2 DAW", "1 ASIR", "2 ASIR");
$formatos = array("Linux", "MySQL");
?>
