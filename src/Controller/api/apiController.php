<?php
namespace App\Controller\api;

use App\Util\templateUtil;

class apiController {
    public function index()
    {
        return templateUtil::exibir("api".DIRECTORY_SEPARATOR."index",[]);
    }

}
