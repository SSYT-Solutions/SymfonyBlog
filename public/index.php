<?php

    require_once '../vendor/autoload.php';
    $app = new Slim\App([
        'settings' => require '../config/settings.php';
    ]);

    $app->add(new \Anddye\Middleware\SessionMiddleware([
        'autorefresh'   => true,
        'name'          => 'session',
        'lifetime'      => '7 days',
        'secure'        => true
    ]));

    // Fetch DI Container
    $container = $app->getContainer();


    unset($app->getContainer()['errorHandler']);
    unset($app->getContainer()['phpErrorHandler']);
    $app->run();
