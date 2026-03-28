<?php
declare(strict_types=1);
namespace src\database;

use PDO;
use PDOException;
use Exception;

class Database
{
    public static function getConnection()
    {
        $host = "localhost";
        $banco = "filmes";
        $usuario = "root";
        $senha = "";
        try {
            $conn = new PDO(
                "mysql:host=$host;dbname=$banco;charset=utf8",
                $usuario,
                $senha
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}