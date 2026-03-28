<?php
declare(strict_types=1);
namespace src\controller;

use src\service\FilmeService;
use src\model\Filme;

class FilmeController {
    public function __construct(
        private FilmeService $filmeService
    ) {}

    public function buscarTodos(): array {
        return $this->filmeService->buscarTodos();
    }

    public function inserir(Filme $filme): void {
        $this->filmeService->inserir($filme);
    }

    public function atualizar(Filme $filme): void {
        $this->filmeService->atualizar($filme);
    }

    public function remover(int $id): void {
        $this->filmeService->remover($id);
    }

    public function buscarId(int $id): ?array {
        return $this->filmeService->buscarId($id);
    }
}