<?php
namespace App\Models;

class Animales extends DBAbstractModel{
    private static $instancia;


    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    public function __clone()
    {
        trigger_error("La clonación no está permitida.", E_USER_ERROR);
    }

    public function __construct(){}

    //Atributos de la clase
    private $id;
    private $nombre;
    private $categoria_id;
    private $raza;
    private $foto;

    public function getID(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setCategoriaID($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function getCategoriaID(){
        return $this->categoria_id;
    }

    public function setRaza($raza){
        $this->raza = $raza;
    }

    public function getRaza(){
        return $this->raza;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getFoto(){
        return $this->foto;
    }
    
    //Métodos CRUD
    public function set(){}
    public function get($id = ""){}
    public function edit(){}
    public function delete(){}
    public function getAnimalesByFilter($filter = ""){
        $this->query = "SELECT * FROM animales WHERE nombre LIKE '%$filter%' OR raza LIKE '%$filter%'";
        $this->parametros["filter"] = '%' . $filter . '%';
        $this->get_results_from_query();
        return $this->rows;
    }
}