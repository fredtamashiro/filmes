<?php
namespace App\Model;

use PDO;
use PDOException;
use App\Database\conexao;

class filmes {

    public $conexao;

    public function __construct() {
        $conexao = new conexao;
        $this->conexao = $conexao->pdo();
    }

    public function gravar($dados)
    {
        $stmt = $this->conexao->prepare('INSERT INTO filmes (ano, titulo, estudio, produtor, vencedor) VALUES (?, ?, ?, ?, ?)');

        $stmt->execute($dados);

        return $this->conexao->lastInsertId();
    }

    public function selecionarPorTitulo($titulo)
    {
        try {
        
            $sql = "SELECT * FROM filmes WHERE titulo = :titulo LIMIT 1";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
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

    public function selecionarTodos()
    {
        try {
            $lista = [];
        
            $sql = "SELECT * FROM filmes ORDER BY titulo ASC";
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

    public function apagar()
    {
        try {
            $sql = "DELETE FROM filmes";
            $stmt = $this->conexao->prepare($sql);
            $resultado = $stmt->execute();

            if ($resultado !== false) {
                return true;
            } 
                
            return false;

        } catch (PDOException $e) {
            echo 'Erro ao executar a consulta: ' . $e->getMessage();
        }
    }
}