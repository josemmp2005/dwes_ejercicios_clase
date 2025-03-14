<?php

namespace App\Core;
class Router
{
    // Inicializo un array de rutas
    private $routes = array();
    // Añado la ruta al array con un metodo
    public function add($route)
    {
        $this->routes[] = $route;
    }
    // Metodo para comprobar si tengo una url en mi array
    public function match(string $request)
    {
        $matches = array();
        foreach ($this->routes as $route) {
            $patron=$route['path'];
            if (preg_match($patron, $request)){
                $matches = $route;
            }
        }
        return $matches;
    }
}