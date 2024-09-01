<?php

require_once "../config/config.php";

// Fonction pour afficher et ajouter une formation
function indexAction(): void
{
    require_once '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    // Récupérer les filtres des formations
    $filters = getFormationFilters();

    // Nombre d'enregistrements par page
    $recordsPerPage = 8;

    // Récupérer le numéro de page depuis les paramètres GET, ou utiliser la page 1 par défaut
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculer l'offset
    $offset = ($page - 1) * $recordsPerPage;

    // Récupérer les données avec limite et offset
    $recordset = searchAndFilterFormation($filters['search'], $filters['orderBy'], $filters['direction'], $offset, $recordsPerPage);

    // Récupérer le nombre total d'enregistrements pour calculer le nombre de pages
    $totalRecords = getTotalFormationCount($filters['search']);
    $totalPages = ceil($totalRecords / $recordsPerPage);


    $config = loadLayoutConfig();
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
            '/js/submit-form.js',
            '/js/modal-delete-verify.js',
            '/js/formation.js'
        ];

    $template = "../views/formation/index.html.php";
    require "../views/layouts/layout.html.php";
}
function getFormationFilters(): array
{
    $search = $_GET['search'] ?? ' ';
    $orderBy = $_GET['sort-by'] ?? 'formation_id';
    $direction = $_GET['sort-direction'] ?? 'DESC';

    return [
        'search' => $search,
        'orderBy' => $orderBy,
        'direction' => $direction,
    ];
}
function addFormationAction(): void
{
    require_once '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    $config = loadLayoutConfig();
    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/admin/formation-style.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css'
        ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
        addFormation();
        // Regenère CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        header('Location: /formation');
    }

    $template = "../views/formation/add-formation.html.php";
    require "../views/layouts/layout.html.php";
}

function archiveFormationAction(): void
{
    checkUserRole(['admin']);
    require '../models/formation/formation.manager.php';

    if (isset($_GET['formation_id'])) {
        archiveFormation($_GET['formation_id']);
    }
    header("Location: /formation");
}


function modifyFormationAction(): void
{
    require '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        $config = loadLayoutConfig();
        updateFormation();
        // Regenère CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // Redirection vers la liste des formations
        header("Location: /formation");
        exit();
    }

    if (isset($_GET['formation_id'])) {
        // Récupérer la formation spécifique
        $formation = getFormationById($_GET['formation_id']);
    } else {
        // Redirection ou message d'erreur si l'ID de la formation n'est pas fourni
        header("Location: /formation");
        exit();
    }

    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/admin/formation-style.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css'
        ];
    $config = loadLayoutConfig();
    $jsFiles =
        [
            '/js/formation.js'
        ];
    $template = "../views/formation/modifyformation.html.php";
    require "../views/layouts/layout.html.php";
}
