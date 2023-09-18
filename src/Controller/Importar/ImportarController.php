<?php

namespace App\Controller\Importar;

use Exception;
use App\Model\filmes;
use App\Model\produtorFilme;
use App\Util\templateUtil;

class ImportarController {
    public function index()
    {
        $filmes = new filmes;
        $lista = $filmes->selecionarTodos();
        // die('<pre>'.print_r($lista,1).'</pre>');

        if(!$lista){
            $lista = [];
        }
        
        return templateUtil::exibir("importar-filmes".DIRECTORY_SEPARATOR."index",['lista'=>$lista]);
    }

    public function store()
    {
        $lista = [];
        $linha = 0;

        try {
            $arquivo = '../src/Database/movielist2.csv';
            $handle = fopen($arquivo, 'r');
            
            if ($handle !== false) {
                $filmes = new filmes;
                // var_dump($filmesDb);
                // die();
            
                while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                    if($linha>0){

                        $resultado = $filmes->selecionarPorTitulo($data[1]);

                        // echo '<pre>'.print_r($data,1).'</pre>';

                        if($resultado==false){
                            $data[4] = $data[4]=='yes'?1:0;

                            $insertId = $filmes->gravar($data);
                            $data['5'] = $insertId;
                            $lista[] = $data;

                            $produtores = $this->separarProdutores($data[3]);
                            $this->gravarListaProdutores($produtores,$data,$insertId);

                        }else{
                            $lista[] = [0=>$resultado['ano'],1=>$resultado['titulo'],5=>$resultado['id']];
                        }


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

    public function delete()
    {
        $filmes = new filmes;
        $apagar = $filmes->apagar();

        $produtorFilme = new produtorFilme;
        $produtorFilme->apagar();

        return templateUtil::exibir("importar-filmes".DIRECTORY_SEPARATOR."apagar",['apagar'=>$apagar]);
    }

    private function separarProdutores($produtores)
    {
        $lista = explode(" ",$produtores);
        for($i=0;$i<count($lista);$i++){
            if(mb_strtolower($lista[$i])=='and'){
                $lista[$i] = " , ";
            }
        }

        $produtores = implode(" ",$lista);
        
        $produtores = explode(",",$produtores);

        return $produtores;
    }

    private function gravarListaProdutores($produtores,$filme,$filmeId)
    {
        $produtorFilme = new produtorFilme;;
        for($i=0;$i<count($produtores);$i++){
            $dados = [
                0 => trim($produtores[$i]),
                1 => $filme[4],
                2 => $filme[0],
                3 => $filmeId
            ];

            if($produtorFilme->existe($filmeId,$produtores[$i])==false){
                $produtorFilme->gravar($dados);
            }
        }
    }
}
