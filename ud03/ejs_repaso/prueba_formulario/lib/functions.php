   <?php
   /**
    * Script con las funciones generales para nuestro proyecto
    * 
    * @author jose maria mayen perez <a23mapejo@gmail.com>
    */

   /**
    * Funcion para limpiar los datos de entrada en un formulario
    *   
    * @param mixed $data
    * @return string
    */ 


   function clearData($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   ?>