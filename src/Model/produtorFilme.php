<?php
namespace App\Model;

use PDO;
use PDOException;
use App\Database\conexao;

class produtorFilme {

    public $conexao;

    public function __construct() {
        $conexao = new conexao;
        $this->conexao = $conexao->pdo();
    }

    public function gravar($dados)
    {
        $stmt = $this->conexao->prepare('INSERT INTO produtor_filme (produtor, vencedor, ano, filme_id) VALUES (?, ?, ?, ?)');

        $stmt->execute($dados);

        return $this->conexao->lastInsertId();
    }

    public function existe($filme_id,$produtor)
    {
        try {
        
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
        
        } catch (PDOException $e) {
            echo 'Erro ao executar a consulta: ' . $e->getMessage();
        }
    }

    public function vencedores()
    {
        try {
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
            
        
            if(count($lista)>0) {
                return $lista;
            }
                
            return false;

        } catch (PDOException $e) {
            echo 'Erro ao executar a consulta: ' . $e->getMessage();
        }
    }
}