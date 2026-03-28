<?php
declare(strict_types=1);
namespace src\controller;

use src\service\DiretorService;
use src\model\Diretor;

class DiretorController {
    public function __construct(
        private DiretorService $diretorService
    ) {}

    public function buscarTodos(): array
    {
        return $this->diretorService->buscarTodos();
    }

    public function inserir(Diretor $diretor): void
    {
       $this->diretorService->inserir($diretor);
    }

    public function atualizar(Diretor $diretor): void
    {
        $this->diretorService->atualizar($diretor);
    }

    public function remover(int $id): void
    {
        $this->diretorService->remover($id);
    }

    public function buscarId(int $id): ?array
    { 
        return $this->diretorService->buscarId($id);
    }
}