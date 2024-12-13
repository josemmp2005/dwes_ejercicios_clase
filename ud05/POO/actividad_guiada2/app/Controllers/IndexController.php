<?php
namespace App\Controllers;
require_once "BaseController.php";


class IndexController extends BaseController
{
    public function IndexAction()
    {
        $data = array('message' => 'Hola mundo');
        $this->renderHTML('../app/views/index_view.php', $data);
    }
    public function SaludoAction($request)
    {
        $nombre = explode("/", $request);
        $nombre = end($nombre);
        $data = array('message' => "Hola " . $nombre);
        $this->renderHTML('../app/views/saludo_view.php', $data);
    }

}

?>