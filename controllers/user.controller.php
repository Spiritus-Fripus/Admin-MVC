<?php

require '../config/config.php';

function indexAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
        if (isset($_POST['search'])) {
            $recordset = search($_POST['search']);
        } else {
            $recordset = showAllUser();
        }
    } else {
        $recordset = showAllUser();
    }

    $title = 'Liste des utilisateurs';
    $cssFile = '/css/admin/user-style.css';
    $config = loadLayoutConfig();
    $template = '../views/user/index.html.php';
    require '../views/layouts/layout.html.php';
}

function addUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
        addUser();
        header('Location : ?controller=user&action=index');
    }

    $title = "Ajouts d'utilisateurs";
    $cssFile = '/css/form-style.css';
    $config = loadLayoutConfig();
    $template = '../views/user/add-user.html.php';
    require '../views/layouts/layout.html.php';
}

function updateUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
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
    
    $config = loadLayoutConfig();
    $cssFile = '/css/form-style.css';
    $template = "../views/user/update-user.html.php";
    require "../views/layouts/layout.html.php";
}


function archiveUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if (isset($_GET['user_id'])) {
        archiveUser($_GET['user_id']);
    }
    header("Location: ?controller=user&action=index");
}


