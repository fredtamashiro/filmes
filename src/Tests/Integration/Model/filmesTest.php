<?php
namespace App\Tests\Integration\Model;

use App\Model\filmes;
use PHPUnit\Framework\TestCase;

class filmesTest extends TestCase {

    public function testGravar():void
    {
        $filmes = new filmes;
        $insertId = $filmes->gravar(['1999','Teste '.date('His'), 'Estudio', 'produtor', '1']);

        // Verifica se $insertId é válido
        $this->assertNotNull($insertId);

        // Verificar se $insertId é um número inteiro maior que zero
        $this->assertIsInt($insertId);
        $this->assertGreaterThan(0, $insertId);

    }

}

?>