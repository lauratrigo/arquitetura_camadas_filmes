<?php
declare(strict_types=1);
namespace src\middleware;

class DiretorMiddleware {
     public function validarDados(array $dados): void
    {
        if (!isset($dados['nome']) || empty($dados['nome'])) {
            throw new \Exception("Nome do diretor é obrigatório");
        }
    }
}