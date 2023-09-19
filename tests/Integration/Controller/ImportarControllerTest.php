<?php
namespace App\Controller;

use App\Controller\Importar\ImportarController;
use PHPUnit\Framework\TestCase;

defined('DB') or define("DB","teste.sqlite"); 

class ImportarControllerTest extends TestCase {

    public function testImportarFilmesCsvGravar():void
    {
        $ImportarController = new ImportarController;
        $resultado = $ImportarController->store();

        $this->assertIsArray($resultado['DADOS']['lista']);
        $this->assertCount(206, $resultado['DADOS']['lista']);
    }

    public function testSelectFilmes():void
    {
        $ImportarController = new ImportarController;
        $resultado = $ImportarController->index();

        $this->assertIsArray($resultado['DADOS']['lista']);
        $this->assertArrayHasKey('id', $resultado['DADOS']['lista'][0]);
        $this->assertArrayHasKey('titulo', $resultado['DADOS']['lista'][0]);
        $this->assertGreaterThan(1,$resultado['DADOS']['lista']);

    }

    // public function testDeletar():void
    // {
    //     $ImportarController = new ImportarController;
    //     $ImportarController->delete();

    //     $resultado = $ImportarController->index();

    //     $this->assertCount(0, $resultado['DADOS']['lista']);
    // }

}

?>