<?php

session_start();
// On inclut dynamiquement le fichier de contrôleur
if (!empty($_GET['controller'])) {

    $controllerName = $_GET['controller'];
} else {
    $controllerName = 'login'; // controller par défault
}

if (file_exists("../controllers/$controllerName.controller.php")) {

    require "../controllers/$controllerName.controller.php";

    if (!empty($_GET['action'])) {

        $action = $_GET['action'] . "Action";
    } else {

        $action = 'formLoginAction'; // Action par défault du contrôleur
    }
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
