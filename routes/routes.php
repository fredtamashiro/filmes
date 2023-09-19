<?php

$routes['GET'] = [
    '/' => ['CLASS'=>'Home\\HomeController','FUNCTION'=>'index'],
    '/importar-filmes' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'index'],
    '/importar-filmes/importar' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'store'],
    '/importar-filmes/apagar' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'delete']
];

