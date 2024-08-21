<?php

require '../config/config.php';

function indexAction(): void
{
    require_once '../models/user/user.manager.php';
    checkUserRole(['admin']);

    // Récupérer les filtres de l'utilisateur
    $filters = getUserFilters();

    // Nombre d'enregistrements par page
    $recordsPerPage = 10;

    // Récupérer le numéro de page depuis les paramètres GET, ou utiliser la page 1 par défaut
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculer l'offset
    $offset = ($page - 1) * $recordsPerPage;

    // Récupérer les données avec limite et offset
    $recordset = searchAndFilterUsers($filters['search'], $filters['type'], $filters['orderBy'], $filters['direction'], $offset, $recordsPerPage);

    // Récupérer le nombre total d'enregistrements pour calculer le nombre de pages
    $totalRecords = getTotalUserCount($filters['search'], $filters['type']);
    $totalPages = ceil($totalRecords / $recordsPerPage);


    $title = 'Liste des utilisateurs';
    $cssFiles =
        [
            '/css/user/user-style.css',
            '/css/generic/main-container.css',
            '/css/generic/table-responsive.css',
            '/css/generic/filter.css',
            '/css/generic/modal.css',
            '/css/generic/button-crud.css',
            '/css/generic/paging.css'
        ];
    $jsFiles =
        [
            '/js/modal-delete-verify.js',
            "/js/submit-form.js"
        ];
    $config = loadLayoutConfig();
    $template = '../views/user/index.html.php';
    require '../views/layouts/layout.html.php';
}

function getUserFilters(): array
{
    $search = $_GET['search'] ?? ' ';
    $orderBy = $_GET['sort-by'] ?? 'created_at';
    $direction = $_GET['sort-direction'] ?? 'DESC';
    $type = $_GET['sort-type'] ?? 'ALL';

    return [
        'search' => $search,
        'orderBy' => $orderBy,
        'direction' => $direction,
        'type' => $type,
    ];
}

function addUserAction(): void
{
    checkUserRole(['admin']);
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
    $cssFiles = ['/css/generic/form.css'];
    $config = loadLayoutConfig();
    $template = '../views/user/add-user.html.php';
    require '../views/layouts/layout.html.php';
}

function updateUserAction(): void
{
    checkUserRole(['admin']);
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
    $cssFiles = ['/css/generic/form.css'];
    $template = "../views/user/update-user.html.php";
    require "../views/layouts/layout.html.php";
}

/**
 * @throws Exception
 */
function archiveUserAction(): void
{
    checkUserRole(['admin']);
    require '../models/user/user.manager.php';

    if (isset($_GET['user_id'])) {
        archiveUser($_GET['user_id']);
    }
    header("Location: ?controller=user&action=index");
}


function userInfoAction(): void
{
    checkUserRole(['admin']);
    require '../models/user/user.manager.php';
    if (isset($_GET['user_id'])) {
        $user = getUserById($_GET['user_id']);
    }
    $config = loadLayoutConfig();
    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/generic/table-card.css'
        ];
    $template = "../views/user/user-info.html.php";
    require "../views/layouts/layout.html.php";
}
