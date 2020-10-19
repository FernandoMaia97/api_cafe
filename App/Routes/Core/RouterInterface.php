<?php

namespace App\Routes\Core;

use Slim\App;

/**
 * RouterInterface
 * Interface para padronizar rotas
 */
interface RouterInterface
{
    public static function register(App $app) : void;
}
