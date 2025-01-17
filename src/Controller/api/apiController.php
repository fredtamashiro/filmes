<?php

namespace App\Controller\api;

use App\Util\templateUtil;

class apiController
{
    public function index()
    {
        return templateUtil::exibir("api/index", []);
    }
}
