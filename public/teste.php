<?php
use App\Model\produtorFilme;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../vendor/autoload.php";


$produtores = new produtorFilme;
$resultado = $produtores->vencedores();


function formatarOrdem($dados,$ordem)
{
    if($ordem=='ASC'){
        ksort($dados);
    }else{
        krsort($dados);
    }

    $saida = [];

    foreach ($dados as $itens) {
        foreach ($itens as $item) {
        // echo '<pre>'.print_r($item,1).'</pre>';
        // die();
            $saida[] = $item;
        }
    }
    
    return $saida;
}

function formatarSaida($min,$max)
{
    $dados = [
        "min" => $min,
        "max" => $max
    ];

    return $dados;
}


$lista = [];

foreach ($resultado as $item) {
    if($item['produtor']){
        $lista[$item['produtor']][$item['ano']] = $item;
    }
}

ksort($lista);

$multiplos = [];

foreach ($lista as $vencedor) {
    if(count($vencedor)>1){
        // echo '<hr><pre>'.print_r($vencedor,1).'</pre>';
        krsort($vencedor);
        array_push($multiplos,$vencedor);
    }
}

$intervalo = [];

foreach ($multiplos as $intervalor) {
    $novaChave = 0;
    $produtor = '';
    $previousWin = '';
    $followingWin = '';
    foreach ($intervalor as $key => $value) {
        if($novaChave===0){
            $novaChave = $key;
            $followingWin = $key;
        }else{
            $novaChave -= $key;
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
    // $chaves = array_keys($intervalor);

    // echo '<pre>'.print_r($chaves,1).'</pre>';
    // echo '<pre>'.print_r($intervalor,1).'</pre>';
    // die();
}

$min = formatarOrdem($intervalo,'ASC');
// echo '<hr><pre>'.print_r($saida,1).'</pre>';
$max = formatarOrdem($intervalo,'DESC');
// echo '<hr><pre>'.print_r($saida,1).'</pre>';

;
echo '<hr><pre>'.print_r(formatarSaida($min,$max),1).'</pre>';

echo '<hr>*************<hr><pre>'.print_r($multiplos,1).'</pre>';
// die();
echo '<hr><pre>'.print_r($lista,1).'</pre>';
echo '<hr><pre>'.print_r($resultado,1).'</pre>';




