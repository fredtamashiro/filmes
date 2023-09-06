<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require "../vendor/autoload.php";
require "../routes/routes.php";

try {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];

    // Verifica se o metodo existe
    if(!isset($routes[$request])){
        http_response_code(405);
        die();
        // !!! adicionar um template bonitinho
    }

    if(!isset($routes[$request][$uri])){
        http_response_code(404);
        die();
        // !!! adicionar um template bonitinho
    }

    $controllerNameSpace = "App\\Controller\\{$routes[$request][$uri]['CLASS']}";

    $controllerIstance = new $controllerNameSpace;
    $function = $routes[$request][$uri]['FUNCTION'];
    
    $controllerIstance->$function();
    // echo '<pre>'.print_r($routes[$request][$uri]['FUNCTION'],1).'</pre>';
    // echo '<pre>'.print_r($routes[$request][$uri],1).'</pre>';

    // $routes[$request]$uri();

}catch(Exception $e){
    $e->getMessage();
}