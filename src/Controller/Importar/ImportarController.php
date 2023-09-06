<?php

namespace App\Controller\Importar;

use Exception;
use App\Util\templateUtil;


class ImportarController {
    public function index()
    {
        
        return templateUtil::exibir('/importar-filmes/index',['titulo'=>'boa tarde']);
    }

    public function store()
    {
        $lista = [];
        $linha = 0;
        // die($_SERVER['SCRIPT_FILENAME']);
        try {
            $arquivo = '../src/Database/movielist2.csv';
            $handle = fopen($arquivo, 'r');
            
            if ($handle !== false) {
            
                while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                    if($linha>0){
                        $lista[] = $data;
                    }
                    $linha++;
                }
            }else{
                throw new Exception('Não foi possivel abrir o arquivo: '.$arquivo);
            }
            
            fclose($handle);

        }catch(Exception $e){
            $e->getMessage();
        }

        return templateUtil::exibir('/importar-filmes/importar',['lista'=>$lista]);
    }
}
