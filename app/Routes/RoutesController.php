<?php
namespace App\Routes;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class RoutesController
{
    public function __construct() {
        global $app;

        $app->get('/', \HomeController::class . ":index");
    }
}
