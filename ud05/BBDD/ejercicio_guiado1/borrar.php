<?php

include("lib/function.php");
/**
 * if (isset($_POST['enviar'])){
 *  $busqueda = $_POST['busqueda']; 
 * }else{
 *  $busqueda = '%';
 * }
 * 
 */
// Probar la conexión
 $id = $_GET['id'];
 $db = conectaDB();
 $sql = "DELETE FROM perros WHERE id = :id";
 $consulta = $db -> prepare($sql);
 $consulta -> execute(array(
                             ":id" => $id));
 header("location: mascotas.php");

?>