<?php
namespace App\Controllers;
require_once "BaseController.php";


class NumerosController extends BaseController
{
    public function ParesAction()
    {
        $numerosPares = array();
        for ($i = 1; count($numerosPares) < 10; $i++) {
            if ($i % 2 == 0) {
                $numerosPares[] = $i;
            }
        }

        $data = array('numerosPares' => $numerosPares);
        $this->renderHTML('../app/views/pares_view.php', $data);
    }
    public function RangoParesAction($request)
    {
        $numero = explode("/", $request);
        $numero = end($numero);

        $numerosPares = array();
        for ($i = 1; count($numerosPares) < $numero; $i++) {
            if ($i % 2 == 0) {
                $numerosPares[] = $i;
            }
        }

        $data = array('numerosPares' => $numerosPares);
        $this->renderHTML('../app/views/pares_view.php', $data);
    }
}

?>