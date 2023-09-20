<?php
namespace App\Model;

use PDO;

class produtorFilme {

    public $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function gravar($dados)
    {
        $stmt = $this->conexao->prepare('INSERT INTO produtor_filme (produtor, vencedor, ano, filme_id) VALUES (?, ?, ?, ?)');

        $stmt->execute($dados);

        return $this->conexao->lastInsertId();
    }

    public function existe($filme_id,$produtor)
    {        
        $sql = "SELECT * FROM produtor_filme WHERE filme_id = :filme_id AND produtor = :produtor LIMIT 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':filme_id', $filme_id, PDO::PARAM_INT);
        $stmt->bindParam(':produtor', $produtor, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            return $row;
        }
            
        return false;
    }

    public function apagar()
    {
        $sql = "DELETE FROM produtor_filme";
        $stmt = $this->conexao->prepare($sql);
        $resultado = $stmt->execute();

        if ($resultado !== false) {
            return true;
        } 
            
        return false;

    }

    public function vencedores()
    {
        $lista = [];
    
        $sql = "SELECT 
                produtor,
                ano
            FROM produtor_filme
            WHERE vencedor = 1 ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $lista[] = $row;
        }
        
        return $lista;
}
}