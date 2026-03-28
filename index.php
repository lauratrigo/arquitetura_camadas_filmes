<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use src\router\FilmeRouter;
use src\router\DiretorRouter;

// cria app do Slim
$app = AppFactory::create();
$app->addBodyParsingMiddleware();

// (opcional, mas ajuda muito em erro)
$app->addErrorMiddleware(true, true, true);

// registra rotas
FilmeRouter::register($app);
DiretorRouter::register($app);

// roda aplicação
$app->run();