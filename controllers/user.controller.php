<?php

require '../config/config.php';
function indexAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';
    $recordset = showAllUser();
    $title = 'Liste des utilisateurs';
    $cssFile = '/css/admin/user-style.css';
    $config = loadLayoutConfig();
    $jsFile = '/js/admin/user.js';
    $template = '../views/user/index.html.php';
    require '../views/layouts/layout.html.php';
}

function updateUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        $config = loadLayoutConfig();
        updateUser();
        // Redirection vers la liste des utilisateurs
        header("Location: ?controller=user&action=index");
        exit();
    }

    if (isset($_GET['user_id'])) {
        // Récupérer l'user spécifique
        $user = getUserById($_GET['user_id']);
    } else {
        // Redirection ou message d'erreur si l'ID de l'user n'est pas fourni
        header("Location: ?controller=user&action=index");
        exit();
    }
    $cssFile = '/css/admin/user-style.css';
    $template = "../views/user/update-user.html.php";
    require "../views/layouts/layout.html.php";
}

function archiveUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if (isset($_GET['user_id'])) {
        archiveUserIntoTable($_GET['user_id']);
    }
    header("Location: ?controller=user&action=index");
}
