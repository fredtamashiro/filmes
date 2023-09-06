<?php

$routes['GET'] = [
    '/' => ['CLASS'=>'Home\\HomeController','FUNCTION'=>'index'],
    '/importar-filmes' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'index'],
    '/importar-filmes/importar' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'store']
];


// function load($controller,$action)
// {
//     try{
//         $controllerNameSpace = "App\\Controller\\{$controller}";

//         if(!class_exists($controllerNameSpace,true)){
//             throw new Exception('O Controller nao existe! : '.$controller);
//         }
    
//         $controllerIstance = new $controllerNameSpace;
    
//         if(!method_exists($controllerIstance,$action)){
//             throw new Exception('O metodo nao existe {'.$action.') no controller: '.$controller);
//         }
    
//         // $controllerIstance->$action();
        
//     }catch(Exception $e){
//         echo $e->getMessage();
//     }

// }

// $routes = [
//     'GET' => [
//         '/' => load('Home\\HomeController','index'),
//         '/importar' => load('Importar\\ImportarController','index')
//     ]
// ];