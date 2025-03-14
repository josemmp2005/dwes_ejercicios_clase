<?php

namespace App\Controllers;

use App\Models\Usuarios;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;


class AuthController
{
    private $requestMethod;

    private $userId;

    private $users;

    public function __construct($requestMethod){
        $this->requestMethod = $requestMethod;
        $this->users = Usuarios::getInstancia();
    }

    public function LoginFromRequest(){
        // Leemos el json
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        // Validamos si el formato de entrada es correcto
        if (json_last_error() != JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'El JSON recibido no es válido', "error" => exit()]);
        }
        $usuario = $input['usuario']??'';
        $password = $input['password']??'';
        $dataUser = $this->users->login($usuario, $password);

        if ($dataUser){
            $key = KEY; // Clave de encriptación
            // Emisor del token
            $issuer_claim = "http://centros_civicos.local";
            // Audiencia del token
            $audience_claim = "http://centros_civicos.local";
            // Tiempo en que fue emitido el token
            $issuedat_claim = time();
            // Tiempo en que el token será válido
            $notbefore_claim = time();
            // Tiempo en que el token expirará
            $expire_claim = $issuedat_claim + 3600;

            $token = array(
                "iss" => $issuer_claim,
                "aud" => $audience_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "usuario" => $usuario
                )
            );

            // Generamos el token jwt
            $jwt = JWT::encode($token, $key, 'HS256');
            $res = json_encode(
                array(
                    "mensaje" => "Acceso concedido",
                    "jwt" => $jwt,
                    "usuario" => $usuario,
                    "ExpireAt" => $expire_claim
                )
            );

            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = $res;

        } else{
            $response['status_code_header'] = 'HTTP/1.1 401 Login failed';
            $response['body'] = null;
        }

        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }
}