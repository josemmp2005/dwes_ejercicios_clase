<?php
namespace App\Models;

class Usuarios extends DBAbstractModel{
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    // Elegimos el usuario que coincida con la contraseña y el nombre que hayamos seleccionado
    public function login($usuario, $password){
        $this->query = "SELECT * FROM usuarios WHERE usuario = :nombre AND password = :password";
        $this->parametros['nombre'] = $usuario;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        return $this->rows[0]??null;
    }

    public function get($data = array()){}

    public function set(){}

    public function edit(){}
    
    public function delete(){}
}