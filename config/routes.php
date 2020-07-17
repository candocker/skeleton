<?php

declare(strict_types = 1);

use Hyperf\HttpServer\Router\Router;
use Swoolecan\Baseapp\Helpers\SysOperation;

$middleware = [
    //App\Middleware\JWTAuthMiddleware::class,
    //App\Middleware\PermissionMiddleware::class,
];

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controllers\IndexController@index');
Router::get('/captcha', 'App\Controllers\IndexController@captcha');

Router::addRoute(['GET', 'POST'], '/logout', 'App\Controllers\EntranceController@logout');
Router::post('/signupin', 'App\Controllers\EntranceController@signupin');
Router::post('/token', 'App\Controllers\EntranceController@token');
Router::post('/{manager_type}/signin', 'App\Controllers\EntranceController@signinManager');
Router::post('/{manager_type}/token', 'App\Controllers\EntranceController@tokenManager');
Router::post('/refresh_token', 'App\Controllers\EntranceController@refreshToken', ['middleware' => [App\Middleware\JwtAuthMiddleware::class]]);
Router::get('/myinfo', 'App\Controllers\UserController@myinfo', ['middleware' => $middleware]);
//Router::get('/passport/myinfo', 'App\Controllers\UserController@myinfo', ['middleware' => $middleware]);

Router::get('/send-code', 'App\Controllers\IndexController@sendCode', ['middleware' => $middleware]);
Router::get('/validate-code', 'App\Controllers\IndexController@validateCode', ['middleware' => $middleware]);

Router::addGroup('/backend', function () {
    $routes = SysOperation::initRouteDatas();
    //print_R($routes);
    foreach ($routes as $rCode => $rMethods) {
        foreach ($rMethods as $action => $data) {
            echo $data['path'] . "\n";
            Router::addRoute($data['method'], $data['path'], $data['callback']);
        }
    }
});

//User
/*Router::get('/users', 'App\Controllers\UserController@index', ['middleware' => $middleware]);
Router::post('/users', 'App\Controllers\UserController@store', ['middleware' => $middleware]);
Router::put('/users/{id:\d+}', 'App\Controllers\UserController@update', ['middleware' => $middleware]);
Router::get('/users/{id:\d+}', 'App\Controllers\UserController@show', ['middleware' => $middleware]);
Router::delete('/users/{id:\d+}', 'App\Controllers\UserController@delete', ['middleware' => $middleware]);
Router::put('/users/{id:\d+}/roles', 'App\Controllers\UserController@roles', ['middleware' => $middleware]);*/

/*Router::addRoute(['GET', 'POST', 'HEAD', 'PUT', 'DELETE'], '/backend/{controller}/{action}', function ($controller, $action) {
    $namespace = 'App\Controllers\\';

    $className = $namespace . ucfirst($controller . "Controller");
    $tempObj = new $className();
    return call_user_func(array($tempObj, $action));
}, ['middleware' => $middleware]);*/
