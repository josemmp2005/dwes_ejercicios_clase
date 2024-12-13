<?php
/**
 * 
 * @author José María Mayén Pérez <a23mapejo@iesgrancapitan.org.com>
 */

 //requerimos clase Persona
 require_once "Persona.php";
 require_once "Alumno.php";

//Creamos un objeto

$persona = new Persona("Jose M", "Mayen", "Perez");

//Acceder a los diferentes metodos

$persona->Saludo();
echo "<br>";
echo $persona->nombre();
echo "<br>";
$alumno =  new Alumno("Jose M", "Mayen", "Perez");
echo $alumno->saluda()
?>