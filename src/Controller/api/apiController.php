<?php

namespace App\Controller\Importar;

use App\Util\templateUtil;


class apiController {
    public function index()
    {
        
        return templateUtil::exibir('/api/index',['titulo'=>'boa tarde']);
    }
}
