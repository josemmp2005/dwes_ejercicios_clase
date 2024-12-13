<?php
    require_once "../../app/Models/Mascotas.php";
    require_once "../../app/conf/conf.php";

    // Creamos mascota sin utilizar el patron de diseño
    $mascota1 = new Mascotas();
    $mascota2 = new Mascotas();
    // Se han creado dos objetos
    
    // Creamos amscotas utilizando el patron de diseño
    $mascota3 = Mascotas::getInstancia();
    $mascota4 = Mascotas::getInstancia();
    // Se ha creado un solo objeto


    $mascota = Mascotas::getInstancia();
    $mascota->setNombre("Tarugo"); 
    $mascota->setPeso("22"); 
    $mascota->setRaza("Labrador");
    
    $mascota->set();

    $mascota->get(14);
?>
