<?php

namespace App\Util;

class templateUtil
{
    public static function exibir($view, $dados): array
    {
        extract($dados);
        $html = self::html();
        $caminho = __DIR__ . "/../View/" . $view . ".php";
        ob_start();
        echo $html['HEADER'];
        require($caminho);
        echo $html['FOOTER'];
        $conteudoDaView = ob_get_clean();
        return ['VIEW' => $conteudoDaView,'DADOS' => $dados];
    }

    public static function menu()
    {
        // o correto é os itens ficar fora dessa funcao
        $menu = '';
        $itens = [
            '/' => 'Dashboard',
            '/importar-filmes' => 'Importar',
            '/api-page' => 'API',
        ];
        foreach ($itens as $key => $value) {
            $ativo = $_SERVER['REQUEST_URI'] == $key ? 'active" aria-current="page' : '';
            $menu .= '<li class="nav-item"><a href="' . $key . '" class="nav-link ' . $ativo . '">' . $value . '</a></li>';
        }

        return $menu;
    }

    public static function api($dados)
    {
        $json = json_encode($dados);
        return ['JSON' => $json,'HTTP' => '200'];
    }

    public static function html(): array
    {
        $menu = self::menu();
        $padrao = __DIR__ . "/../View/template/padrao.php";
        $html = file_get_contents($padrao);
        $html = str_replace("<%MENU%>", $menu, $html);
        $estrutura = explode("<%SLOT%>", $html);
        return ['HEADER' => $estrutura[0], 'FOOTER' => $estrutura[1]];
    }
}
