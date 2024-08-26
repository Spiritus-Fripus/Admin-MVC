<?php

require_once '../config/config.php';

function indexAction(): void
{
    checkUserRole(['admin']);
    require '../models/user/user-archive.manager.php';

    $filters = getUserArchivedFilters();
    // Nombre d'enregistrements par page
    $recordsPerPage = 10;

    // Récupérer le numéro de page depuis les paramètres GET, ou utiliser la page 1 par défaut
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculer l'offset
    $offset = ($page - 1) * $recordsPerPage;

    // Récupérer les données avec limite et offset
    $recordset = searchAndFilterUsersArchived($filters['search'], $filters['type'], $filters['orderBy'], $filters['direction'], $offset, $recordsPerPage);

    // Récupérer le nombre total d'enregistrements pour calculer le nombre de pages
    $totalRecords = getTotalUserArchivedCount($filters['search'], $filters['type']);
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
    $jsFiles = [
        '/js/modal-delete-verify.js',
        "/js/submit-form.js"
    ];
    $config = loadLayoutConfig();
    $template = '../views/user-archive/index.html.php';
    require '../views/layouts/layout.html.php';
}

function getUserArchivedFilters(): array
{
    $search = $_GET['search'] ?? '';
    $orderBy = $_GET['sort-by'] ?? 'user_archive_id';
    $direction = $_GET['sort-direction'] ?? 'DESC';
    $type = $_GET['sort-type'] ?? 'ALL';

    return [
        'search' => $search,
        'orderBy' => $orderBy,
        'direction' => $direction,
        'type' => $type,
    ];
}
