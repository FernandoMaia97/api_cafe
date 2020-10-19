<?php

namespace App\Routes\Core;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Routes\Cafes;
use \PDO;

/**
 * Router
 * Classe para chamar Rotas
 */
class Router
{
    public function __construct()
    {
    }

    public static function boot($app)
    {
        Cafes::register($app);
    }
}
