<?php
if (! session_id ()) @ session_start ();

require '../vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/home', ['App\controllers\HomeController','index']);
    $r->addRoute('GET', '/about', ['App\controllers\HomeController','about']);
    $r->addRoute('GET', '/add_page', ['App\controllers\HomeController','add_page']);
    $r->addRoute('POST', '/add_task', ['App\controllers\HomeController','add_task']);
    $r->addRoute('GET', '/admin_login', ['App\controllers\HomeController','admin_login']);
    $r->addRoute('POST', '/login_check', ['App\controllers\HomeController','login_check']);

    $r->addRoute('GET', '/edit/{id:\d+}', ['App\controllers\HomeController','edit']);
    $r->addRoute('POST', '/edit_task', ['App\controllers\HomeController','edit_task']);
    $r->addRoute('GET', '/admin_logout', ['App\controllers\HomeController','admin_logout']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 404;
        d($_SERVER);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $newHandler = new $handler[0];
        $method = $handler[1];

        call_user_func([$newHandler,$method],$vars);
        break;
}
