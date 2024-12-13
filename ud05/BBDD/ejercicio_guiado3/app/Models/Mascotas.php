<?php
# Importar modelo de abstracción de base de datos
require_once('DBAbstractModel.php');
class Mascotas extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $mascotas = __CLASS__;
            self::$instancia = new $mascotas;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
    private $id;
    private $nombre;
    private $raza;
    private $peso;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setRaza($raza)
    {
        $this->raza = $raza;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $this->query = "INSERT INTO perros(nombre, peso, raza)
        VALUES(:nombre, :peso, :raza)";

        //$this->parametros['id']= $id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['peso'] = $this->peso;
        $this->parametros['raza'] = $this->raza;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Perro añadido.';
    }

    public function get($id = ""){
        if($id != ''){
            $this->query = "SELECT * FROM perros WHERE id = :id";
            $this->parametros['id'] = $id ;
            $this->get_results_from_query();
            $this->mensaje = 'Perro obtenido.';

            if(count($this->rows) > 0){
                foreach ($this->rows[0] as $propiedad=>$valor){
                    $this->$propiedad = $valor;
                }
                echo "ID: " . $id . "<br>";
                echo "Nombre: " . $this->nombre . "<br>";
                echo "Raza: " . $this->raza . "<br>";
                echo "Peso: " . $this->peso . "<br>";
                echo "Creado en: " . $this->created_at . "<br>";
                echo "Actualizado en: " . $this->updated_at . "<br>";
            }else{
                echo "No se ha encontrado el perro";
            }
          
            return $this->rows[0]??null;

        }
        
    }
    public function edit(){
        
    }
    public function delete(){

    }


}
