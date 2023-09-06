<?php
namespace App\Util;

class templateUtil {

    public static function exibir($view, $dados): void
    {
        extract($dados);
        $html = self::html();

        $caminho = "../src/View" . $view . ".php";

        echo $html['HEADER'];
        require($caminho);
        echo $html['FOOTER'];

    }

    public static function html(): array
    {
        $html = file_get_contents("../src/View/template/padrao.php");

        $estrutura = explode("<%SLOT%>", $html);

        return ['HEADER' => $estrutura[0], 'FOOTER' => $estrutura[1]];
    }

}

