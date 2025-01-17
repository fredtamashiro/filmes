<?php

namespace App\Controller\api;

use App\Database\conexao;
use App\Util\templateUtil;
use App\Model\produtorFilme;

class intervaloPremiosController
{
    public function index()
    {
        $conexao = new conexao();
        $produtores = new produtorFilme($conexao->pdo());
        $resultado = $produtores->vencedores();

        $lista = [];

        foreach ($resultado as $item) {
            if ($item['produtor']) {
                $lista[$item['produtor']][$item['ano']] = $item;
            }
        }

        ksort($lista);

        $multiplos = [];

        foreach ($lista as $vencedor) {
            if (count($vencedor) > 1) {
                $pares = $this->criarPares($vencedor);

                for ($i = 0; $i < count($pares); $i++) {
                    array_push($multiplos, $pares[$i]);
                }
            }
        }

        $intervalo = [];

        foreach ($multiplos as $intervalor) {
            $novaChave = 0;
            $produtor = '';
            $previousWin = '';
            $followingWin = '';

            foreach ($intervalor as $key => $value) {
                if ($novaChave === 0) {
                    $novaChave = $key;
                    $followingWin = $key;
                } else {
                    if ($key <= $novaChave) {
                        $novaChave -= $key;
                    } else {
                        $novaChave = $key - $novaChave;
                    }
                    $previousWin = $key;
                }

                $produtor = $value['produtor'];
            }

            $intervalo[$novaChave][] = [
                'producer' => $produtor,
                'interval' => $novaChave,
                'previousWin' => $previousWin,
                'followingWin' => $followingWin
            ];
        }

        $min = $this->formatarOrdem($intervalo, 'ASC');

        $max = $this->formatarOrdem($intervalo, 'DESC');

        $dadosApi = $this->formatarSaida($min, $max);

        return templateUtil::api($dadosApi);
    }

    function formatarOrdem($dados, $ordem)
    {
        if ($ordem == 'ASC') {
            ksort($dados);
        } else {
            krsort($dados);
        }

        $saida = [];

        foreach ($dados as $itens) {
            foreach ($itens as $item) {
                $saida[] = $item;
            }
        }

        return $saida;
    }

    function formatarSaida($min, $max)
    {
        $dados = [
            "min" => $min,
            "max" => $max
        ];

        return $dados;
    }

    function criarPares($vencedor)
    {

        krsort($vencedor);
        $chaves = array_keys($vencedor);

        $pares = [];

        for ($i = 0; $i < count($chaves) - 1; $i++) {
            $par = [
                $chaves[$i] => $vencedor[$chaves[$i]],
                $chaves[$i + 1] => $vencedor[$chaves[$i + 1]]
            ];
            $pares[] = $par;
        }

        return $pares;
    }
}
