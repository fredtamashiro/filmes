<?php
namespace App\Util;

class templateUtil {

    public static function exibir($view, $dados): void
    {
        extract($dados);
        // die('<pre>'.print_r($lista,1).'</pre>');

        $html = self::html();

        $caminho = __DIR__.DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."View".DIRECTORY_SEPARATOR . $view . ".php";

        echo $html['HEADER'];
        require($caminho);
        echo $html['FOOTER'];

    }

    public static function api($dados)
    {
        header('Content-Type: application/json');
        http_response_code(200);

        $json = json_encode($dados);

        echo $json;
    }

    public static function html(): array
    {
        $padrao = __DIR__.DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."View".DIRECTORY_SEPARATOR ."template" .DIRECTORY_SEPARATOR. "padrao.php";
        $html = file_get_contents($padrao);

        $estrutura = explode("<%SLOT%>", $html);

        return ['HEADER' => $estrutura[0], 'FOOTER' => $estrutura[1]];
    }

}

