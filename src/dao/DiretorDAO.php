<?php
declare(strict_types=1);
namespace src\dao;

use PDO;
use src\database\Database;
use src\model\Diretor;


class DiretorDAO
{
// método que lista todos os diretores
    public function buscarTodos(): array
    {
        $conn = Database::getConnection(); // cria ou consegue se conectar ao banco de dados
        // $conn é um objeto PDO (da conexão)
        $sql = "SELECT * FROM diretores";  // aqui é definido qual comando SQL será rodado no banco

        $stmt = $conn->query($sql); // executa o SQL direto no banco
        // $stmt significa statement (que seria um resultado da consulta)

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // pega todos os resultados da consulta e transforma em um array, exemplo, 'id' => 1, 'titulo' => 'nome do filme'
    }

    public function inserir(Diretor $diretor): void
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO diretores (nome) VALUES (:nome)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':nome' => $diretor->getNome(),
        ]);
    }

    public function atualizar(Diretor $diretor): void
    {

        $conn = Database::getConnection();

        $sql = "UPDATE diretores SET nome = :nome WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':id' => $diretor->getId(),
            ':nome' => $diretor->getNome(),
        ]);
    }


    public function remover(int $id): void
    {

        $conn = Database::getConnection();

        $sql = "DELETE FROM diretores WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);
    }

    // método que busca apenas um diretor por id
    public function buscarId(int $id): ?array { // esse ? serve para retornar um false caso não encontre o diretor no banco de dados

        $conn = Database::getConnection();
        $sql = 'SELECT * FROM diretores WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id'=> $id
            ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

}