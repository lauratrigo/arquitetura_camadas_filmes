<?php
// Carregar autoload do Composer
require __DIR__ . '/../vendor/autoload.php';
// Criar aplicação Slim
$app = \Slim\Factory\AppFactory::create();
// Rota 1: Ola mundo
$app->get('/rota1', function ($request, $response) {
$response->getBody()->write('Olá Mundo!');
return $response;
});
// Rota 1: Ola web
$app->get('/rota2', function ($request, $response) {
$response->getBody()->write('Olá web!');
return $response;
});
// Executar a aplicação
$app->run();