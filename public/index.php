<?php

session_start();

// Obtenir la route
function getRouteFromRequest()
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    if (empty($uri)) {
        // Route par défaut 
        return 'login';
        // Route par défaut 
        return 'login';
    }
    return $uri;
}

// Inclure le fichier de routes
$routeMap = require '../config/routes.php';

// Récupérer la route depuis l'URL
$route = getRouteFromRequest();
// Nettoyer la route
$route = preg_replace('/[^a-zA-Z0-9_-]/', '', $route);

// Vérifier si la route existe dans le tableau
if (isset($routeMap[$route])) {
    $controllerName = $routeMap[$route]['controller'];
    $action = $routeMap[$route]['action'];
} else {
    // 404
    $controllerName = 'error';
    $action = 'notFoundAction';
}

// Inclure le contrôleur et exécuter l'action
$controllerPath = "../controllers/$controllerName.controller.php";
if (file_exists($controllerPath)) {
    require $controllerPath;
    if (function_exists($action)) {
        $action();
    } else {
        require_once '../controllers/error.controller.php';
        notFound();
    }
} else {
    require_once '../controllers/error.controller.php';
    notFound();
}
