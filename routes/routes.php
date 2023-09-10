<?php

$routes['GET'] = [
    '/' => ['CLASS'=>'Home\\HomeController','FUNCTION'=>'index'],
    '/importar-filmes' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'index'],
    '/importar-filmes/importar' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'store'],
    '/importar-filmes/apagar' => ['CLASS'=>'Importar\\ImportarController','FUNCTION'=>'delete'],
    '/api' => ['CLASS'=>'api\\apiController','FUNCTION'=>'index'],
    '/api/intervalo-premios' => ['CLASS'=>'api\\apiController','FUNCTION'=>'intervaloPremios'],
];

