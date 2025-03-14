<?php

namespace App\Controllers;

use App\Models\Contactos;

class ContactosController {
    private $requestMethod;
    private $contactosId;

    private $contactos;

    public function __construct($requestMethod, $contactosId)
    {
        $this->requestMethod = $requestMethod;
        $this->contactosId = $contactosId;
        $this->contactos = Contactos::getInstancia();
    }

    /**
     * Funcion que procesa la peticion
     * return: Respuesta de la petición
     */
    public function processRequest(){
        switch ($this->requestMethod) {
            case 'GET':
                $response = $this->getContactos($this->contactosId);
                break;
            case 'POST':
                // $input = (array) json_decode(file_get_contents('php://input'), TRUE); 
                $response = $this->createContactos();
                break;
            case 'PUT':
                $response = $this->updateContactos($this->contactosId);
                break;
            case 'DELETE':
                $response = $this->deleteContactos($this->contactosId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getContactos($id){
        if($id == 0){
            $result = $this->contactos->getAll();
        }else{
            $result = $this->contactos->get($id);
        }
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function createContactos(){
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (!$this->validateContactos($input)) {
            return $this->notFoundResponse();
        }
        $this->contactos->set($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateContactos($id){
        $result = $this->contactos->get($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (!$this->validateContactos($input)) {
            return $this->notFoundResponse();
        }
        $this->contactos->edit($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteContactos($id){
        $result = $this->contactos->get($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $this->contactos->delete($id);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function validateContactos($input){
        if (!isset($input['nombre']) || !isset($input['telefono']) || !isset($input['email'])) {
            return false;
        }
        return true;
    }

    public function notFoundResponse(){
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}