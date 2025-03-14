<?php

namespace App\Controllers;

use App\Models\Animales;

class AnimalesController extends BaseController{
    public function IndexAction($filtro =""){
        $data = array();
        $animales = Animales::getInstancia();
        $data = $animales->getAnimalesByFilter($filtro);

        // $animales = Animales::getInstancia();

        // if(isset($_POST['filtro'])){
        //     $data = $animales->getAnimalesByFilter($_POST['filtro']);
        // }else{
        //     $data = $animales->getAnimalesByFilter();   
        // }

        $this->renderHTML('index_view.php', $data);
    }
    public function ObtenerAction($filtro =""){
        $data = array();
        $animales = Animales::getInstancia();
        $data = $animales->getAnimalesByFilter($filtro);

        $this->renderHTML('list_view.php', $data);
    }
}


?>