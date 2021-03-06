<?php
require_once '../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

// We create a collection to store alle routes
$routes = new RouteCollection();

// I have a route that match /login and have a default _controller corresponding to MyController

// Dans les lignes suivante les \\ permettent d'escaper le \ qui est nécessaire pour indiquer que UserController et ArticleController sont dans le namespace Controller.

$homeRoute = new Route('/', array('_controller' => 'Controller\\ArticleController::listAction'));

$loginRoute = new Route('/login', array('_controller' => 'Controller\\UserController::loginAction'));
$logoutRoute = new Route('/logout', array('_controller' => 'Controller\\UserController::logoutAction'));
$registerRoute = new Route('/register', array('_controller' => 'Controller\\UserController::registerAction'));

$articleCreateRoute = new Route('/articleCreate', array('_controller' => 'Controller\\ArticleController::createAction'));
$articleDeleteRoute = new Route('/articleDelete', array('_controller' => 'Controller\\ArticleController::deleteAction'));
$articleRoute = new Route('/article', array('_controller' => 'Controller\\ArticleController::detailAction'));

$cartAddRoute = new Route('/cartAdd', array('_controller' => 'Controller\\CartController::add'));
$cartListRoute = new Route('/cartList', array('_controller' => 'Controller\\CartController::list'));



// I put this route inside a collection and name it route_name
$routes->add('home_route', $homeRoute);
$routes->add('login_route', $loginRoute);
$routes->add('logout_route', $logoutRoute);
$routes->add('register_route', $registerRoute);
$routes->add('article_create_route', $articleCreateRoute);
$routes->add('article_delete_route', $articleDeleteRoute);
$routes->add('article_route', $articleRoute);
$routes->add('cart_add_route', $cartAddRoute);
$routes->add('cart_list_route', $cartListRoute);


// I define where is the base url
$context = new RequestContext('/');

// I create a matcher to find a specific route inside the collection
$matcher = new UrlMatcher($routes, $context);


$url = $_SERVER['REQUEST_URI'];

// pour éviter d'avoir tout le chemin, on peut utiliser PHP_SELF qui ne contiendra pas les arguments du GET.

// ce qui nous intéresse se trouve normalement derrière /index.php

if (substr($url, 0, strlen('/index.php')) == '/index.php'){
    $url = substr($url, strlen('/index.php'));
}

// si l'url est vide => rien derrière localhost ou rien derrière index.php, on considère que l'on a "/" car c'est 
// cela que l'on va rechercher dans nos routes.

if ($url =='') $url = '/';

// les lignes suivantes sont nécessaires car l'on pourrait passer des argument (GET) => on ne doit considérer que la partie
// précédent le ?

$searchElement = explode ("?", $url, 2);

// echo '<br>' . 'searchElement = "' . $searchElement[0] . '"' ;

// Si Symfony ne "trouve" pas de route, il renvoit une exception.
// On l'intercepte et on envoit la page d'erreur avec l'erreur code 404 : page not found.

try {
    $parameters = $matcher->match($searchElement[0]);
} catch (ResourceNotFoundException $e) {
    $errorCode = 404;
    $errorMessage = "Page Not Found !";
    include "../src/Templates/error.php";
    die();
}
$controllerData = $parameters['_controller'];
list($class, $method) = explode ('::', $controllerData);

// echo '<br>' . 'Controller = "' . $class . '"' ;
// echo '<br>' . 'method = "' . $method . '"' ;


$controller = new $class;
$controller->$method();
