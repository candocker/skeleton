<?php

declare(strict_types = 1);

use Hyperf\HttpServer\Router\Router;
use Swoolecan\Baseapp\Helpers\SysOperation;

$middleware = [
    //App\Middleware\JWTAuthMiddleware::class,
    //App\Middleware\PermissionMiddleware::class,
];

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controllers\IndexController@index');

Router::addGroup('/', function () {
    $routes = SysOperation::initRouteDatas();
    //print_R($routes);
    foreach ($routes as $rCode => $rMethods) {
        foreach ($rMethods as $action => $data) {
            echo $data['path'] . "\n";
            Router::addRoute($data['method'], $data['path'], $data['callback']);
        }
    }
});
