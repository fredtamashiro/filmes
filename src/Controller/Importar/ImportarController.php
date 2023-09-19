<?php

namespace App\Controller\Importar;

use App\Database\conexao;
use Exception;
use App\Model\filmes;
use App\Model\produtorFilme;
use App\Util\templateUtil;

class ImportarController {
    public function index()
    {
        $conexao = new conexao;
        $filmes = new filmes($conexao->pdo());
        $lista = $filmes->selecionarTodos();

        if(!$lista){
            $lista = [];
        }
        
        return templateUtil::exibir("importar-filmes/index",['lista'=>$lista]);
    }

    public function store()
    {
        $lista = [];
        $linha = 0;

        $arquivo = __DIR__."/../../Database/movielist.csv";

        $handle = fopen($arquivo, 'r');
        
        if ($handle !== false) {

            $conexao = new conexao;
            $filmes = new filmes($conexao->pdo());
        
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
                        $this->gravarListaProdutores($conexao->pdo(),$produtores,$data,$insertId);

                    }else{
                        $lista[] = [0=>$resultado['ano'],1=>$resultado['titulo'],5=>$resultado['id']];
                    }


                }
                $linha++;
            }
        
            fclose($handle);
        }else{
            throw new Exception('Não foi possivel abrir o arquivo: '.$arquivo);
        }

        return templateUtil::exibir("importar-filmes/importar",['lista'=>$lista]);
    }

    public function delete()
    {
        $conexao = new conexao;

        $filmes = new filmes($conexao->pdo());
        $apagar = $filmes->apagar();

        $produtorFilme = new produtorFilme($conexao->pdo());
        $produtorFilme->apagar();

        return templateUtil::exibir("importar-filmes/apagar",['apagar'=>$apagar]);
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

    private function gravarListaProdutores($conexao,$produtores,$filme,$filmeId)
    {
        $produtorFilme = new produtorFilme($conexao);
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
