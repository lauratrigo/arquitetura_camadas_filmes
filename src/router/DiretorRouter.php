<?php
declare(strict_types=1);

namespace src\router;

use src\controller\DiretorController;
use src\service\DiretorService;
use src\dao\DiretorDAO;
use src\model\Diretor;
use src\middleware\DiretorMiddleware;

class DiretorRouter
{
    public static function register($app): void
    {
        // lista todos os diretores
        $app->get('/diretores', function ($request, $response) {

            $controller = new DiretorController(
                new DiretorService(new DiretorDAO())
            );

            $dados = $controller->buscarTodos();

            $response->getBody()->write(json_encode($dados));
            return $response;
        });

        // busca um diretor específico por id
        $app->get('/diretores/{id}', function ($request, $response, $args) {

            $controller = new DiretorController(
                new DiretorService(new DiretorDAO())
            );

            $dados = $controller->buscarId((int)$args['id']);

            $response->getBody()->write(json_encode($dados));
            return $response;
        });

        $app->post('/diretores', function ($request, $response) {

            try {
                $dados = $request->getParsedBody();

                // middleware (validação)
                $middleware = new DiretorMiddleware();
                $middleware->validarDados($dados);

                $diretor = new Diretor(
                    0,
                    $dados['nome']
                );

                $controller = new DiretorController(
                    new DiretorService(new DiretorDAO())
                );

                $controller->inserir($diretor);

                $response->getBody()->write(json_encode([
                    "msg" => "Diretor criado"
                ]));

                return $response->withStatus(201);

            } catch (\Exception $e) {
                $response->getBody()->write(json_encode([
                    "erro" => $e->getMessage()
                ]));
                return $response->withStatus(400);
            }
        });

        $app->put('/diretores/{id}', function ($request, $response, $args) {

            try {
                $dados = $request->getParsedBody();

                $middleware = new DiretorMiddleware();
                $middleware->validarDados($dados);

                $diretor = new Diretor(
                    (int)$args['id'],
                    $dados['nome']
                );

                $controller = new DiretorController(
                    new DiretorService(new DiretorDAO())
                );

                $controller->atualizar($diretor);

                $response->getBody()->write(json_encode([
                    "msg" => "Diretor atualizado"
                ]));

                return $response;

            } catch (\Exception $e) {
                $response->getBody()->write(json_encode([
                    "erro" => $e->getMessage()
                ]));
                return $response->withStatus(400);
            }
        });

        $app->delete('/diretores/{id}', function ($request, $response, $args) {

            $controller = new DiretorController(
                new DiretorService(new DiretorDAO())
            );

            $controller->remover((int)$args['id']);

            $response->getBody()->write(json_encode([
                "msg" => "Diretor removido"
            ]));

            return $response;
        });
    }
}