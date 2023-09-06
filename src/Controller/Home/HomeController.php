<?php
namespace App\Controller\Home;

use App\Util\templateUtil;

class HomeController {
    public function index() {
        //echo '<h1>HOME</h1>';
        // Lógica para a página inicial
        // include 'Views/home.php';

        return templateUtil::exibir('/home/index',['titulo'=>'boa tarde']);
    }
}
