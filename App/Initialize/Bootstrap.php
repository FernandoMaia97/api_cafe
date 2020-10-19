<?php

namespace App\Initialize;

use DI\Bridge\Slim\Bridge;
use App\Routes\Core\Router;

/**
 * Bootstrap
 * Classe de inicialização da aplicação
 */
class Bootstrap
{
    public function __construct()
    {

    }

    public function boot()
    {
        $app = Bridge::create();

        Router::boot($app);

        $app->run();
    }
}
