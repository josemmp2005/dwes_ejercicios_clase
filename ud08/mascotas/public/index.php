<?php

//Carga de archivos de configuración de la autocarga de clases
require('../vendor/autoload.php');
//Carga de archivos de configuración
require "../bootstrap.php";


// Importación de clases
use App\Core\Router;
use App\Controllers\AnimalesController;

// Creación de rutas
$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [AnimalesController::class, 'IndexAction'],
));

// Obtiene la solicitud actual
$request =  $_SERVER['REQUEST_URI']; 

// Busca la ruta correspondiente a la solicitud
$route = $router->match(request: $request);
if ($route) {
    // Si la ruta existe, se ejecuta el controlador y acción correspondientes
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    // Si no se encuentra la ruta, muestra un mensaje de error
    echo "No route";
}