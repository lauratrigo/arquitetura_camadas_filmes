<?php
declare(strict_types=1);
namespace src\dao;

use PDO;
use src\database\Database;
use src\model\Filme;

class FilmeDAO
{
    // método que lista todos os filmes
    public function buscarTodos(): array
    {
        $conn = Database::getConnection(); // cria ou consegue se conectar ao banco de dados
        // $conn é um objeto PDO (da conexão)
        $sql = "SELECT * FROM filmes";  // aqui é definido qual comando SQL será rodado no banco

        $stmt = $conn->query($sql); // executa o SQL direto no banco
        // $stmt significa statement (que seria um resultado da consulta)

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // pega todos os resultados da consulta e transforma em um array, exemplo, 'id' => 1, 'titulo' => 'nome do filme'
    }

    public function inserir(Filme $filme): void
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO filmes (titulo, diretor_id) VALUES (:titulo, :diretor_id)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':titulo' => $filme->getTitulo(),
            ':diretor_id' => $filme->getDiretorId()
        ]);
    }

    public function atualizar(Filme $filme): void
    {

        $conn = Database::getConnection();

        $sql = "UPDATE filmes SET titulo = :titulo, diretor_id = :diretor_id WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':id' => $filme->getId(),
            ':titulo' => $filme->getTitulo(),
            ':diretor_id' => $filme->getDiretorId()
        ]);
    }


    public function remover(int $id): void
    {

        $conn = Database::getConnection();

        $sql = "DELETE FROM filmes WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);
    }

    // método que busca apenas um filme por id
    public function buscarId(int $id): array
    {

        $conn = Database::getConnection();
        $sql = 'SELECT * FROM filmes WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }
}