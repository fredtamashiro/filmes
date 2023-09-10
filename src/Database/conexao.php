<?php
namespace App\Database;

use PDO;
use Exception;
use PDOException;

class conexao {

    public function pdo()
    {
        try {
            $db = new PDO('sqlite:../src/Database/filmes.db');

            $tabelaFilmes = 'CREATE TABLE IF NOT EXISTS filmes (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                titulo VARCHAR(100) NOT NULL,
                estudio VARCHAR(100) NOT NULL,
                produtor VARCHAR(100) NOT NULL,
                vencedor INTEGER,
                ano INTEGER)';

            $tabelaProdutores = 'CREATE TABLE IF NOT EXISTS produtor_filme (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                produtor VARCHAR(100) NOT NULL,
                filme_id INTEGER NOT NULL,
                vencedor INTEGER,
                ano INTEGER)';

            $db->exec($tabelaFilmes);
            $db->exec($tabelaProdutores);

            return $db;

        } catch (PDOException $e) {

            throw new Exception('Erro ao conectar no banco de dados: ' . $e->getMessage());
        }
    }
}
