<?php
namespace App\Models;

class Contactos extends DBAbstractModel{
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function set($data = array()){
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "INSERT INTO contactos (nombre, telefono, email) 
                        VALUES (:nombre, :telefono, :email)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
        $this->mensaje = "Contacto agregado";

    }

    public function get($id = ''){
        if ($id != '') {
            $this->query = "SELECT * FROM contactos WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                // $this->$propiedad = $valor;
            }
            $this->mensaje = "Contacto encontrado";
        } else {
            $this->mensaje = "Contacto no encontrado";
        }
        return $this->rows[0]??null;
    }

    public function edit($id = '', $data = array()){
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "UPDATE contactos SET nombre = :nombre, telefono = :telefono, email = :email WHERE id = :id";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Contacto modificado";
    }

    public function delete($id = ''){
        $this->query = "DELETE FROM contactos WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Contacto eliminado";
    }

    public function getAll(){
        $this->query = "SELECT * FROM contactos";
        $this->get_results_from_query();
        return $this->rows ?? null;
    }

}