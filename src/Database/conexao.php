<?php
namespace App\Database;

use PDO;

class conexao {

    public $database;

    public function __construct() {
        $this->database = DB;
    }

    public function pdo()
    {
        $sqlite = 'sqlite: '.$this->database.'.db';

        $db = new PDO($sqlite);

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
        
    }
}
