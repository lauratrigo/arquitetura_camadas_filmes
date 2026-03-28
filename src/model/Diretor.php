<?php
declare(strict_types=1);
namespace src\model;

class Diretor
{
    // construtor
    public function __construct(
        private int $id,
        private string $nome,
    ) {}

    // getters e setters (encapsulamento)
    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

}