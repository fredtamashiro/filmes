<?php

namespace App\Database;

use Exception;
use PDO;

class conexao
{
    public $database;

    public function __construct()
    {
        if (!defined('DB')) {
            throw new Exception("A constante do Banco de Dados nao foi definida");
        }

        $this->database = DB;
    }

    public function pdo()
    {
        $sqlite = "sqlite:" . __DIR__ . "\\" . $this->database;
        $db = new PDO($sqlite);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
