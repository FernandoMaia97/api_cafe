<?php

namespace App\Routes;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Routes\Core\RouterInterface;
use Slim\App;
use \PDO;

/**
 * Cafes
 * Classe para chamar Rotas de Cafes
 */
class Cafes implements RouterInterface
{
    public function __construct()
    {
    }

    public static function register(App $app) : void
    {
        $app->group(
            '/cafes',
            function (RouteCollectorProxy $group) {
                $group->get(
                    '/',
                    function (Request $request, Response $response) {
          $pdo = new PDO(
                    $_SERVER['DBMS'] . ':dbname=' . $_SERVER['DBNAME'] .
                        ';host='. $_SERVER['DBHOST'],
                    $_SERVER['DBUSER'],
                    $_SERVER['DBPASS']
                );
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = 'SELECT * FROM tipo';
          $resultSet = $pdo->query($sql);
          $payload = json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
          $response->getBody()->write($payload);
          return $response->withHeader('Content-Type', 'application/json');
                    }
          );
          $group->get(
                    '/{id}',
                    function ($id, Response $response) {
          $pdo = new PDO(
                    $_SERVER['DBMS'] . ':dbname=' . $_SERVER['DBNAME'] .
                        ';host='. $_SERVER['DBHOST'],
                    $_SERVER['DBUSER'],
                    $_SERVER['DBPASS']
                );
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = 'SELECT * FROM tipo WHERE id = :id';
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':id', $id);
          $stmt->execute();
          $payload = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)[0]);
          $response->getBody()->write($payload);
          return $response->withHeader('Content-Type', 'application/json');
                    }
                );
            }
        );
        $app->get(
            '/',
            function (Request $request, Response $response) {
                $response->getBody()->write('Hello world!');
                return $response;
            }
        );
    }
}
