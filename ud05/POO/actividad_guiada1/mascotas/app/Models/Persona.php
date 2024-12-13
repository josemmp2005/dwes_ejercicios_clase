<?php
/**
 * 
 */

class Persona
{
   private $_nombre;
   private $_apellido1;
   private $_apellido2;

   public function __construct($nombre, $apellido1, $apellido2)
   {
      $this->_nombre = $nombre; //$this es una pseudovariable
      $this->_apellido1 = $apellido1;
      $this->_apellido2 = $apellido2;
   }

   /**
    * Funcion que devuelve el nombre y los apellidos de la persona
    * @return string
    */
   public function nombre()
   {
      return $this->_nombre . " " .  $this->_apellido1 . " " . $this->_apellido2;
   }

   /**
    * /Función que devuelve un saludo
    * @return void
    */
   public function Saludo()
   {
      echo "Hola Mundo";
   }

}
?>