<?php
namespace App\Api;

use PHPUnit\Framework\TestCase;
use App\Controller\Importar\ImportarController;
use App\Controller\api\intervaloPremiosController;

defined('DB') or define("DB","teste.sqlite"); 

class intervaloPremiosControllerTest extends TestCase {

    public function testGet():void
    {
        $intervaloPremiosController = new intervaloPremiosController;
        $resultado = $intervaloPremiosController->index();

        $this->assertJson($resultado['JSON']);

        $dados = json_decode($resultado['JSON'],true);
        //  print_r($dados);
        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('min', $dados);
        $this->assertArrayHasKey('max', $dados);

        foreach ($dados['min'] as $item) {
            $this->assertArrayHasKey('producer', $item);
            $this->assertArrayHasKey('interval', $item);
            $this->assertArrayHasKey('previousWin', $item);
            $this->assertArrayHasKey('followingWin', $item);
        }
        
        foreach ($dados['max'] as $item) {
            $this->assertArrayHasKey('producer', $item);
            $this->assertArrayHasKey('interval', $item);
            $this->assertArrayHasKey('previousWin', $item);
            $this->assertArrayHasKey('followingWin', $item);
        }

        foreach ($dados['min'] as $item) {
            $this->assertIsString($item['producer']);
            $this->assertIsInt($item['interval']);
            $this->assertIsInt($item['previousWin']);
            $this->assertIsInt($item['followingWin']);
        }
        
        foreach ($dados['max'] as $item) {
            $this->assertIsString($item['producer']);
            $this->assertIsInt($item['interval']);
            $this->assertIsInt($item['previousWin']);
            $this->assertIsInt($item['followingWin']);
        }
        
    }

    public function testApagaDb():void
    {
        $ImportarController = new ImportarController;
        $ImportarController->delete();

        $resultado = $ImportarController->index();

        $this->assertCount(0, $resultado['DADOS']['lista']);
    }

}

?>