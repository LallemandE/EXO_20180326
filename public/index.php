<?php
require_once '../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

// We create a collection to store alle routes
$routes = new RouteCollection();

// i have a route that mathc /foo and have a default _controller corresponding to MyController
// \\ pour escaper le \ dans la ligne suivante.
$loginRoute = new Route('/login', array('_controller' => 'Controller\\UserController::loginAction'));



// I put this route inside a collection and name it route_name
$routes->add('login_route', $loginRoute);

// I define wher is the base url
$context = new RequestContext('/');

// I create a matcher to find a specific route inside the collection

$matcher = new UrlMatcher($routes, $context);

if (substr($_SERVER['REQUEST_URI']), 0, strlen('/index.php')) == '/index.php'){
    $url = substr($url, strlen('/index.php'));
}

$parameters = $matcher->match($url);

$controller = $parameters['_controller'];
list ($class, $method) = explode ('::', $controller);

$controller = new $class;
$controller->$method;






