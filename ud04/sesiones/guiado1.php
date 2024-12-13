<?php
/**
 * 
 * 
 */

session_start();
if(!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = 'Jose';
    $_SESSION['apellidos'] = 'Mayen';
}
?>