<?php
declare(strict_types=1);
namespace src\model;

class Filme
{
    // construtor
    public function __construct(
        private int $id,
        private string $titulo,
        private int $diretor_id,
    ) {}

    // getteers e setters
    public function getId(): int {
        return $this->id;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getDiretorId(): int {
        return $this->diretor_id;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }
}