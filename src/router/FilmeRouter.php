<?php
declare(strict_types=1);
namespace src\router;

use src\controller\FilmeController;
use src\service\FilmeService;
use src\dao\FilmeDAO;
use src\model\Filme;
use src\middleware\FilmeMiddleware;

class FilmeRouter
{
    public static function register($app): void
    {
        // get de todos os filmes
        $app->get('/filmes', function ($request, $response) {

            $controller = new FilmeController(
                new FilmeService(new FilmeDAO())
            );

            $dados = $controller->buscarTodos();

            $response->getBody()->write(json_encode($dados));
            return $response;
        });

        // get de um filme específico pelo id
        $app->get('/filmes/{id}', function ($request, $response, $args) {

            $controller = new FilmeController(
                new FilmeService(new FilmeDAO())
            );

            $dados = $controller->buscarId((int) $args['id']);

            $response->getBody()->write(json_encode($dados));
            return $response;
        });

        $app->post('/filmes', function ($request, $response) {

            try {
                $dados = $request->getParsedBody();

                if (!$dados) {
                    throw new \Exception("Body da requisição está vazio ou inválido");
                }

                $middleware = new FilmeMiddleware();
                $middleware->validarDados($dados);

                $filme = new Filme(
                    0,
                    $dados['titulo'],
                    $dados['diretor_id']
                );

                $controller = new FilmeController(
                    new FilmeService(new FilmeDAO())
                );

                $controller->inserir($filme);

                $response->getBody()->write(json_encode([
                    "msg" => "Filme criado"
                ]));

                return $response->withStatus(201);

            } catch (\Exception $e) {
                $response->getBody()->write(json_encode([
                    "erro" => $e->getMessage()
                ]));
                return $response->withStatus(400);
            }
        });

        $app->put('/filmes/{id}', function ($request, $response, $args) {

            try {
                $dados = $request->getParsedBody();

                $middleware = new FilmeMiddleware();
                $middleware->validarDados($dados);

                $filme = new Filme(
                    (int) $args['id'],
                    $dados['titulo'],
                    $dados['diretor_id']
                );

                $controller = new FilmeController(
                    new FilmeService(new FilmeDAO())
                );

                $controller->atualizar($filme);

                $response->getBody()->write(json_encode([
                    "msg" => "Filme atualizado"
                ]));

                return $response;

            } catch (\Exception $e) {
                $response->getBody()->write(json_encode([
                    "erro" => $e->getMessage()
                ]));
                return $response->withStatus(400);
            }
        });

        $app->delete('/filmes/{id}', function ($request, $response, $args) {

            $controller = new FilmeController(
                new FilmeService(new FilmeDAO())
            );

            $controller->remover((int) $args['id']);

            $response->getBody()->write(json_encode([
                "msg" => "Filme removido"
            ]));

            return $response;
        });
    }
}