<?php
declare(strict_types=1);
namespace src\service;

use src\dao\FilmeDAO; // importa a classe DAO dos filmes e a classe do model
use src\model\Filme;

class FilmeService
{
    public function __construct(
        private FilmeDAO $filmeDAO // atributo da classe DAO
    ) {
    }

    public function buscarTodos(): array
    {
        return $this->filmeDAO->buscarTodos();
    }

    public function inserir(Filme $filme): void
    {
        $this->filmeDAO->inserir($filme);
    }

    public function atualizar(Filme $filme): void
    {
        $this->filmeDAO->atualizar($filme);
    }

    public function remover(int $id): void
    {
        $this->filmeDAO->remover($id);
    }

    public function buscarId(int $id): ?array
    {
        return $this->filmeDAO->buscarId($id);
    }

}