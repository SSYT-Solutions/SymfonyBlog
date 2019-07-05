<?php
    date_default_timezone_set("UTC");
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once '../vendor/autoload.php';
    $app = new Slim\App([
        'settings' => require '../config/settings.php'
    ]);

    $app->add(new \Anddye\Middleware\SessionMiddleware([
        'autorefresh'   => true,
        'name'          => 'session',
        'lifetime'      => '7 days',
        'secure'        => true
    ]));

    use Psr\Container\ContainerInterface as ContainerInterface;
    // Fetch DI Container
    $container = $app->getContainer();

    $container['environment'] = function() {
          $scriptName = $_SERVER['SCRIPT_NAME'];
          $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
          return new Slim\Http\Environment($_SERVER);
    };

    $container['session'] = function ($container) {
        return new \Anddye\Session\Helper();
    };

    $container['HomeController'] = function(ContainerInterface $container) {
        return new App\Controllers\HomeController($container);
    };

    $container['Guest'] = function(ContainerInterface $container) {
        return new App\Middleware\Guest($container);
    };

    new App\Routes\RoutesController();

    unset($app->getContainer()['errorHandler']);
    unset($app->getContainer()['phpErrorHandler']);
    $app->run();
