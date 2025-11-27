<?php

session_start();

/**
 * This is the central route handler of the application.
 * It uses FastRoute to map URLs to controller methods.
 * 
 * See the documentation for FastRoute for more information: https://github.com/nikic/FastRoute
 */

require __DIR__ . '/../vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

/**
 * Define the routes for the application.
 */
$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\Controllers\HomeController', 'home']);
    $r->addRoute('GET', '/hello/{name}', ['App\Controllers\HelloController', 'greet']);
    $r->addRoute('GET', '/guestbook', ['App\Controllers\GuestbookController', 'getAll']);
    $r->addRoute('POST', '/guestbook', ['App\Controllers\GuestbookController', 'postMessage']);
    $r->addRoute('GET', '/guestbook/manage', ['App\Controllers\GuestbookController', 'manage']);
    $r->addRoute('POST', '/guestbook/delete', ['App\Controllers\GuestbookController', 'delete']);
    $r->addRoute('GET', '/guestbook/edit/{id}', ['App\Controllers\GuestbookController', 'editForm']);
    $r->addRoute('POST', '/guestbook/edit/{id}', ['App\Controllers\GuestbookController', 'update']);
    $r->addRoute('GET', '/login', ['App\Controllers\LoginController', 'loginForm']);
    $r->addRoute('POST', '/login', ['App\Controllers\LoginController', 'login']);
    $r->addRoute('GET', '/logout', ['App\Controllers\LoginController', 'logout']);
    $r->addRoute('GET', '/articles', ['App\Controllers\ArticleController', 'index']);
});


/**
 * Get the request method and URI from the server variables and invoke the dispatcher.
 */
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = strtok($_SERVER['REQUEST_URI'], '?');
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

/**
 * Switch on the dispatcher result and call the appropriate controller method if found.
 */
switch ($routeInfo[0]) {
    // Handle not found routes
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo 'Not Found';
        break;
    // Handle routes that were invoked with the wrong HTTP method
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo 'Method Not Allowed';
        break;
    // Handle found routes
    case FastRoute\Dispatcher::FOUND:
        

        $controllerName = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $params = $routeInfo[2];

        $controller = new $controllerName();

        $controller->$method($params);

        // throw new Exception('Not implemented yet');

        break;
}
