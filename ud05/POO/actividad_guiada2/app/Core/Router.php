<?php

namespace App\Core;
class Router
{
    // Definimos un array de rutas
    private $routes = array();

    // Funcion para añadir al array una nueva ruta
    public function add($route)
    {
        $this->routes[] = $route;
    }
    
    public function match(string $request)
    {
        $matches = array();
        foreach ($this->routes as $route) {
            $patron = $route['path'];
            
            // Preg_match compara con expresiones regulares
            if (preg_match($patron, $request)) {
                $matches = $route;
            }
        }
        return $matches;
    }
}

?>