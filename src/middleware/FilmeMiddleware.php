<?php
declare(strict_types=1);
namespace src\middleware;

class FilmeMiddleware {
    public function validarDados(array $dados): void
    {
        // valida o titulo do filme
        if (!isset($dados['titulo']) || empty($dados['titulo'])) {
            throw new \Exception("Título é obrigatório");
        }

        // valida o diretor_id
        if (!isset($dados['diretor_id']) || !is_numeric($dados['diretor_id'])) {
            throw new \Exception("Diretor inválido");
        }
    }
}