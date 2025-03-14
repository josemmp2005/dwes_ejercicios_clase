<?php
/**
 * 
 * @author José María Mayén Pérez <email>
 */

class Contador{
    private $contador; //variable privada
    private static $instancia = 0; //variable estatica

    /**
     * Creacion del constructor
     * @param mixed $cont
     */ 
    public function __construct($cont = 0) {
        $this->contador = $cont;
        self::$instancia ++;
    }
    /**
     * Creacion de contar para aumentar la variable contador
     * @return static
     */


    public function contar(){
        $this->contador ++;
        return $this;
    }

    public static function nInstancias(){
        return self::$instancia;
    }

    /**
     * Creacion toString
     * @return string
     */
    public function __tostring(){
        return (string) $this->contador;
    }
}

?>