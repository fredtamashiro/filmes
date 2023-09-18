<?php
namespace App\Model;

use PDO;
use PDOException;
use App\Database\conexao;

class filmes {

    public $conexao;

    public function __construct() {
        $conexao = new conexao();
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
        $sql = "SELECT * FROM filmes WHERE titulo = :titulo LIMIT 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            return $row;
        }
            
        return false;
    }

    public function selecionarTodos()
    {
        $lista = [];
    
        $sql = "SELECT * FROM filmes ORDER BY titulo ASC";
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $lista[] = $row;
        }
        
        return $lista;

    }

    public function apagar()
    {
        $sql = "DELETE FROM filmes";
        $stmt = $this->conexao->prepare($sql);
        $resultado = $stmt->execute();

        if ($resultado !== false) {
            return true;
        } 
            
        return false;

    }
}