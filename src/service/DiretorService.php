<?php
declare(strict_types=1);
namespace src\service;

use src\dao\DiretorDAO; // importa a classe DAO do diretor e a classe do model
use src\model\Diretor;

class DiretorService
{

    public function __construct(
        private DiretorDAO $diretorDAO // atributo da classe DAO
    ) {}
    public function buscarTodos(): array
    {
        return $this->diretorDAO->buscarTodos();
    }

    public function inserir(Diretor $diretor): void
    {
       return $this->diretorDAO->inserir($diretor);
    }

    public function atualizar(Diretor $diretor): void
    {
        return $this->diretorDAO->atualizar($diretor);
    }

    public function remover(int $id): void
    {
        return $this->diretorDAO->remover($id);
    }

    public function buscarId(int $id): ?array
    { 
        return $this->diretorDAO->buscarId($id);
    }
}