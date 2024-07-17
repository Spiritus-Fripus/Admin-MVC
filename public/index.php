<?php

session_start();
// On inclut dynamiquement le fichier de contrôleur
$controllerName = !empty($_GET['controller']) ? $_GET['controller'] : 'login';

if (file_exists("../controllers/$controllerName.controller.php")) {

    require "../controllers/$controllerName.controller.php";

    $action = !empty($_GET['action']) ? $_GET['action'] . 'Action' : 'formLoginAction';

    if (function_exists($action)) {
        $action(); // Index par défaut
    } else {
        require '../controllers/error.controller.php';
        notFound(); // Action 404
    }
} else {
    require '../controllers/error.controller.php';
    notFound(); // Action 404
}


//// index.php
//
//session_start();
//
//// Inclusion du fichier de configuration des routes
//$routes = require '../config/routes.php';
//
//// Récupération de l'URL demandée
//$path = $_SERVER['REQUEST_URI'];
//
//// Vérification si la route existe dans notre configuration
//if (isset($routes[$path])) {
//    $route = $routes[$path];
//    $controllerName = $route['controller'];
//    $action = $route['action'] . 'Action';
//
//    // Inclusion du contrôleur correspondant
//    if (file_exists("../controllers/$controllerName.controller.php")) {
//        require "../controllers/$controllerName.controller.php";
//
//        // Vérification de l'existence de l'action dans le contrôleur
//        if (function_exists($action)) {
//            $action();
//        } else {
//            require '../controllers/error.controller.php';
//            notFound(); // Action 404 si l'action n'existe pas
//        }
//    } else {
//        require '../controllers/error.controller.php';
//        notFound(); // Action 404 si le contrôleur n'existe pas
//    }
//} else {
//    require '../controllers/error.controller.php';
//    notFound(); // Action 404 si la route n'existe pas dans notre configuration
//}
