<?php
/**
 * 
 */

require_once "Persona.php";
class Alumno extends Persona{
    private $_nie;
    public function saluda(){
        echo parent::Saludo();
        echo ", ";
        echo "Soy un alumno";
    }
}

 
?>