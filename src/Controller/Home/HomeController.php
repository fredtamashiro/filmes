<?php
namespace App\Controller\Home;

use App\Util\templateUtil;

class HomeController {
    public function index() 
    {
        return templateUtil::exibir("home/index",['titulo'=>'boa tarde']);
    }
}
