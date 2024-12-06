<?php declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use DI\ContainerBuilder;

define('APP_ROOT', dirname(__DIR__));

require APP_ROOT . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));

$dotenv->load();

$builder = new ContainerBuilder;

$container = $builder->addDefinitions(APP_ROOT . '/config/definitions.php')
                     ->build();

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/api/products', function (Request $request, Response $response) {

    $repository = $this->get(App\Repositories\ProductRepository::class);

    $data = $repository->getAll();

    $body = json_encode($data, JSON_PRETTY_PRINT);

    $response->getBody()->write($body);

    return $response->withHeader('Content-Type', 'application/json');

});

$app->run();