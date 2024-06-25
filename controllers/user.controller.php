<?php

require '../config/config.php';

function indexAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    $search = $_POST['search'] ?? '';
    $orderBy = $_POST['sort-by'] ?? 'created_at';
    $direction = $_POST['sort-direction'] ?? 'DESC';
    $type = $_POST['sort-type'] ?? 'ALL';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
    }

    $recordset = searchAndFilterUsers($search, $type, $orderBy, $direction);

    $title = 'Liste des utilisateurs';
    $cssFile = '/css/user/user-style.css';
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
        header('Location: ?controller=user&action=index');
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


/**
 * @throws Exception
 */

function archiveUserAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';

    if (isset($_GET['user_id'])) {
        archiveUser($_GET['user_id']);
    }
    header("Location: ?controller=user&action=index");
}


function userInfoAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';
    if (isset($_GET['user_id'])) {
        $user = getUserById($_GET['user_id']);
    }
    $config = loadLayoutConfig();
    $cssFile = '/css/user/user-info.css';
    $template = "../views/user/user-info.html.php";
    require "../views/layouts/layout.html.php";
}
