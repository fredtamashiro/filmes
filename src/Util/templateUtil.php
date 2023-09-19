<?php
namespace App\Util;

class templateUtil {

    public static function exibir($view, $dados): array
    {
        extract($dados);
        // die('<pre>'.print_r($lista,1).'</pre>');

        $html = self::html();

        $caminho = __DIR__."/../View/". $view . ".php";

        ob_start();
            echo $html['HEADER'];
            require($caminho);
            echo $html['FOOTER'];
        $conteudoDaView = ob_get_clean();

        return ['VIEW'=>$conteudoDaView,'DADOS'=>$dados];
    }

    public static function api($dados)
    {
        $json = json_encode($dados);

        return ['JSON'=>$json,'HTTP'=>'200'];
    }

    public static function html(): array
    {
        $padrao = __DIR__."/../View/template/padrao.php";
        $html = file_get_contents($padrao);

        $estrutura = explode("<%SLOT%>", $html);

        return ['HEADER' => $estrutura[0], 'FOOTER' => $estrutura[1]];
    }

}

